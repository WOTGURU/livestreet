<?php

use Behat\Behat\Context\ClosuredContextInterface,
    Behat\Behat\Context\TranslatedContextInterface,
    Behat\Behat\Context\BehatContext,
    Behat\MinkExtension\Context\MinkContext,
    Behat\Mink\Exception\ExpectationException,
    Behat\Behat\Exception\PendingException;
use Behat\Gherkin\Node\PyStringNode,
    Behat\Gherkin\Node\TableNode;

$sDirRoot = dirname(realpath((dirname(__FILE__)) . "/../../../../../"));
set_include_path(get_include_path().PATH_SEPARATOR.$sDirRoot);

require_once("tests/behat/features/bootstrap/BaseFeatureContext.php");

/**
 * LiveStreet custom feature context
 */
class FeatureContext extends MinkContext
{
    public function __construct(array $parameters)
    {
        $this->parameters = $parameters;
        $this->useContext('base', new BaseFeatureContext($parameters));
    }

    public function getEngine() {
        return $this->getSubcontext('base')->getEngine();
    }

    /**
     * @Then /^the response meta have:$/
     */
    public function ResponseMetaHave(TableNode $table)
    {
        $content = $this->getSession()->getPage()->getContent();

        foreach ($table->getHash() as $genreHash) {
            $searchValue = preg_quote($genreHash['value'], '/');
            $pattern = '/<meta.*(name=\"' . $genreHash['name'] . '\" content=\".*' . $searchValue . '.*\")|(content=\".*' . $searchValue . '.*\" name=\"' . $genreHash['name'] . '\").*>.*/Ui';

            if (!preg_match($pattern, $content)) {
                $message = "Value {$searchValue} has not found in {$genreHash['name']}";
                throw new ExpectationException($message, $this->getSession());
            }
        }
    }

}
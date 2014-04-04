Feature: ls-plugin_seo-plugins
  Test base functionality of ls-plugin_seo

@mink:selenium2
  Scenario: Check topic seo data
    Then check is plugin active "seo"

    Given I am on "/login"
    Then I want to login as "admin"
    Then I wait "1000"

    Given I am on "/topic/edit/3/"
    Then I wait "1000"

    Then I fill in "SЕО keywords for topic:" with "test seo keyword"
    Then I fill in "topic_seo_description" with "test seo description"
    Then I press "Publish"

    Then I wait "1000"
    Then the response meta have:
      | name        | value |
      | description | test seo description |
      | keywords    | test seo keyword |

@mink:selenium2
  Scenario: Check blog seo data
    Then check is plugin active "seo"

    Given I am on "/login"
    Then I want to login as "admin"
    Then I wait "1000"

    Given I am on "/blog/edit/4/"
    Then I wait "1000"

    Then I fill in "blog_seo_" with "blog_seo_keyword"
    Then I fill in "blog_seo_description_" with "blog_seo_description"
    Then I press "Save"
    Then I wait "1000"

    Then the response meta have:
      | name        | value  |
      | description | blog_seo_description |
      | keywords    | blog_seo_keyword |

@mink:selenium2
  Scenario: Check Create topic with seo
    Then check is plugin active "seo"

    Given I am on "/login"
    Then I want to login as "admin"
    Then I wait "1000"

    Given I am on "/topic/add/"

    Then I select "Gadgets" from "blog_id"
    Then I fill in "topic_title" with "test seo topic"
    Then I fill in "topic_text" with "test test test tess test test"
    Then I fill in "topic_tags" with "test seo"
    Then I fill in "topic_seo_keyword" with "new_seo_keyword"
    Then I fill in "topic_seo_description" with "new_seo_description"
    Then I press "Publish"

    Then the response meta have:
      | name        | value |
      | description | new_seo_description |
      | keywords    | new_seo_keyword |

  @mink:selenium2
  Scenario: Check create blog with seo
    Then check is plugin active "seo"

    Given I am on "/login"
    Then I want to login as "admin"
    Then I wait "1000"

    Given I am on "/blog/add/"
    Then I wait "1000"

    Then I fill in "blog_title" with "blog_seo_name"
    Then I fill in "blog_url" with "blogurl"
    Then I fill in "blog_description" with "seo blog test description"
    Then I fill in "blog_seo_" with "blog_new_seo"
    Then I fill in "blog_seo_description_" with "blog_new_seo_description"
    Then I press "Save"
    Then I wait "1000"

    Then the response meta have:
      | name        | value  |
      | description | blog_new_seo_description |
      | keywords    | blog_new_seo |
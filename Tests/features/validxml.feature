Feature: valid xml
    In order to have good code
    As webapp user
    I need to have always valid xml code

Scenario: Anonymous users have valid xml in homepage
    Given I am on "/index.php"
    When I am not logged in
    Then I have valid XML

Scenario: Logged users have valid xml in homepage
    Given I am on "/index.php"
    When I logged in
    Then I have valid XML
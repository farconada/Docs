Feature: login
    In order to access the application
    As anonymous user
    I need to login to see other menu entries

Scenario: Anonymous users need to login
    Given I am on "index.php"
    When I am not logged in
    Then I could only login and logout

Scenario: Logged users could see more options than anonymous
    Given I am on "index.php"
    When I logged in
    Then I could see more options than anonymous
    
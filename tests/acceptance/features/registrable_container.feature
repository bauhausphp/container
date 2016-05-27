Feature: Registrable container to register new items with read-only access
   In order to register new items and to keep them accessible, but not muttable
   As a registrable container user
   I should be able to register new items and to retrieve them

   Background:
      Given a registrable container with the follow items:
         | name       | value      |
         | pokemon    | Charmander |
         | pirate     | Barbossa   |
         | music      | Right Now  |

   Scenario Outline: Registering a new item to the given container
      When I register a new item with name "<name>" and value "<value>"
      Then I should retrieve "<value>" requesting the item "<name>"

      Examples:
         | name               | value |
         | instrument         | Bass  |
         | another instrument | Drums |
         | food               | Pizza |

   Scenario Outline: Should not be able to retrieve an item with a taken name
      When I try to register a new item with name "<name>"
      Then I should receive the exception "ContainerItemAlreadyExistsException"

      Examples:
         | name    |
         | pokemon |
         | pirate  |
         | music   |

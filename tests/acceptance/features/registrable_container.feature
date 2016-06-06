Feature: Registrable container
   In order to register new items and to keep them accessible, but not muttable
   As a registrable container user
   I should be able to register new items and them to retrieve them

   Background:
      Given a "registrable" container with the following items:
         | label      | value      |
         | pokemon    | Charmander |

   Scenario Outline: Registering a new item
      When I register an item with label "<label>" and value "<value>"
      And I require the value of the item "<label>"
      Then I should receive the "<value>"

      Examples:
         | label      | value      |
         | pirate     | Barbossa   |
         | music      | Right Now  |
         | instrument | Bass       |

   Scenario: Trying to register an item with a label already taken
      When I try to register an item with label "pokemon" already taken
      Then the exception "ContainerItemAlreadyExists" is throwed with the message:
         """
         There is already an item with label 'pokemon'
         """

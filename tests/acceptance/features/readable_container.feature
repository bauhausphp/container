Feature: Readable container
   In order to keep data accessible, but not muttable
   As a readable container user
   I should be able only to read items

   Background:
      Given a "readable" container with the following items:
         | label      | value      |
         | pokemon    | Charmander |
         | pirate     | Barbossa   |
         | music      | Right Now  |
         | instrument | Bass       |

   Scenario Outline: Verifying if an item exists
      When I verify if the item "<label>" exists
      Then I should receive "<item's existence>"

      Examples:
         | label       | item's existence |
         | pokemon     | true             |
         | pirate      | true             |
         | music       | true             |
         | instrument  | true             |
         | someName    | false            |
         | Pokemon     | false            |

   Scenario Outline: Retrieving an item's value
      When I require the value of the item "<label>"
      Then I should receive the "<value>"

      Examples:
         | label       | value      |
         | pokemon     | Charmander |
         | pirate      | Barbossa   |
         | music       | Right Now  |
         | instrument  | Bass       |

   Scenario: Retrieving all items
      When I require all items
      Then I should receive an array with the following items:
         | label      | value      |
         | pokemon    | Charmander |
         | pirate     | Barbossa   |
         | music      | Right Now  |
         | instrument | Bass       |

   Scenario: Iterating all items
      When I iterate the given container
      Then I should receive an array with the following items:
         | label      | value      |
         | pokemon    | Charmander |
         | pirate     | Barbossa   |
         | music      | Right Now  |
         | instrument | Bass       |

   Scenario: Trying to retrieve value of non existent item
      When I require the value of the item "Pokemon" that does not exists
      Then the exception "ContainerItemNotFound" is throwed with the message:
         """
         No item labeled as 'Pokemon' was found in container
         """

Feature: Readable container to keep data accessible, but also safe
   In order to keep data accessible, but not writable for external agents
   As a readable container user
   I should be able only to read the items stored inside a readable container

   Background:
      Given a readable container with the follow items:
         | name       | value      |
         | pokemon    | Charmander |
         | pirate     | Barbossa   |
         | music      | Right Now  |
         | instrument | Bass       |

   Scenario Outline: Verifying if the given container has specific data
      When I verify if the container has the item "<name>"
      Then I should receive "<expected>"

      Examples:
         | name        | expected |
         | pokemon     | true     |
         | pirate      | true     |
         | music       | true     |
         | instrument  | true     |
         | aName       | false    |
         | anotherName | false    |
         | bla         | false    |
         | Pokemon     | false    |

   Scenario Outline: Retrieving item values from the given container
      When I request the container for the value of the item "<name>"
      Then I should receive "<expected>"

      Examples:
         | name        | expected   |
         | pokemon     | Charmander |
         | pirate      | Barbossa   |
         | music       | Right Now  |
         | instrument  | Bass       |

   Scenario Outline: Retrieving magically item values from the given container
      When I request magically the container for the value of the item "<name>"
      Then I should receive "<expected>"

      Examples:
         | name        | expected   |
         | pokemon     | Charmander |
         | pirate      | Barbossa   |
         | music       | Right Now  |
         | instrument  | Bass       |

   Scenario Outline: Trying to retrieve value of non existent item from the given container
      When I request the container for the value of the item "<name>"
      Then I should receive the exception "ContainerItemNotFoundException"

      Examples:
         | name       |
         | Pokemon    |
         | some text  |
         | other text |
         | blabla     |

   Scenario Outline: Trying to retrieve magically value of non existent item from the given container
      When I request magically the container for the value of the item "<name>"
      Then I should receive the exception "ContainerItemNotFoundException"

      Examples:
         | name       |
         | Pokemon    |
         | some text  |
         | other text |
         | blabla     |

   Scenario: Retrieving all items from the given container
      When I request the container for all items
      Then I should receive an array with the follow data:
         | name       | value      |
         | pokemon    | Charmander |
         | pirate     | Barbossa   |
         | music      | Right Now  |
         | instrument | Bass       |

   Scenario: Using the given container as iterator in a foreach statment
      When I use the container as iterator in a foreach statment
      Then I should receive an array with the follow data:
         | name       | value      |
         | pokemon    | Charmander |
         | pirate     | Barbossa   |
         | music      | Right Now  |
         | instrument | Bass       |

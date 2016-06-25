Feature: Readable container
   In order inherit readable container features
   As a readable container subclass
   I should have consistent readable container properties

   Scenario: Trying to register an item with a label already taken
      Given I am a readable container with the following items:
         | label      | value      |
         | pokemon    | Charmander |
         | pokemon    | Charmander |
      When I try to register an item with label "pokemon" and value "Pikachu"
      Then the exception "Bauhaus\Container\Exception\ContainerItemAlreadyExists" is throwed with the message:
         """
         There is already an item with label 'pokemon' in this container
         """

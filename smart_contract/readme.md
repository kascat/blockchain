## SHA-256

#### Detalhes do trabalho:

Acessem http://remix.ethereum.org e no ambiente solidity, usando a versão 0.6.12, e consultando a documentação em
https://solidity.readthedocs.io/en/v0.6.12/ descreva um smart contract simples de comparecimento, ou seja, um “atestado”;

```
pragma solidity ^0.6.12;

contract Attestation {

  address public people;

  struct People {
    uint id;
    bool markedPresence;
  }

  mapping(address => People) public people;

  // Set markedPresence as true
  function markPresence() public {
    people.markedPresence = true;
  }

  // Set markedPresence as false
  function deselectPresence() public {
    people.markedPresence = false;
  }

  // Set people
  function setPeople(address p) public {
    people = p;
  }

  // Get people
  function getPeople() public (address) {
    return people;
  }
}

```

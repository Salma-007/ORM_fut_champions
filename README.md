# Documentation en POO

## Objectif de la OOP 
### Définition 
La programmation orientée objet modélise les entités du monde réel en utilisant des objets. 
### Avantages 
- Réutilisabilité
- Scalabilité
- Maintenabilité
## Concepts de base de la OOP
- **Encapsulation**: Protéger les données en restreignant l'accès direct aux composants de l'objet.
- **Abstraction**: Simplifier la complexité en cachant les détails d'implémentation.
- **Héritage**: Créer des classes dérivées à partir de classes existantes.
- **Polymorphisme**: Utiliser une interface commune pour différents types d'objets.
  
## Classes et Objets
### Définir une classe et créer un objet
```php
  class Person {
    public $name;
    public function __construct($name) {
      $this->name = $name;
    }
    public function greet() {
      return "Hello,   " . $this->name;
    }
  }
  $person = new Person("Alice");
  echo $person->greet();
```

## Propriétés et Méthodes
Les propriétés sont des attributs de la classe, et les méthodes sont des fonctions définies dans la classe.

## Constructeurs et Destructeurs
Le constructeur __construct() initialise les objets. Le destructeur __destruct() nettoie les ressources.
Exemple:
```php
class Database {
    private $connection;

    public function __construct($dsn, $username, $password) {
        $this->connection = new PDO($dsn, $username, $password);
    }

    public function __destruct() {
        $this->connection = null;
    }
}
```
## Modificateurs d'accès
**public**: Accessible partout.
**private**: Accessible uniquement au sein de la classe.
**protected**: Accessible dans la classe et ses sous-classes.
Exemple:
```php
class Example {
    public $publicProperty;
    private $privateProperty;
    protected $protectedProperty;

    public function setPrivate($value) {
        $this->privateProperty = $value;
    }

    public function getPrivate() {
        return $this->privateProperty;
    }
}
```
## Encapsulation
encapsulation est souvent mise en œuvre en définissant la visibilité des propriétés et des méthodes à l’intérieur de la classe. Les trois niveaux de visibilité les plus couramment utilisés sont :

- Public : Les propriétés et les méthodes publiques sont accessibles depuis n’importe où, à l’intérieur ou à l’extérieur de la classe.
- Protected : Les propriétés et les méthodes protégées sont accessibles uniquement depuis la classe elle-même et les classes héritières.
  Private : Les propriétés et les méthodes privées ne sont accessibles qu’à l’intérieur de la classe où elles sont définies.
```php
class MaClasse {
    public $publicProp = "Propriété publique";
    protected $protectedProp = "Propriété protégée";
    private $privateProp = "Propriété privée";

}

// Instanciation de la classe
$objet = new MaClasse();

// Accès aux propriétés
echo $objet->publicProp . ""; // Accès autorisé
//echo $objet->protectedProp . ""; // Erreur fatale : accès protégé
//echo $objet->privateProp . ""; // Erreur fatale : accès privé
```

## Héritage:
L’héritage permet à une classe enfant de bénéficier des propriétés et des méthodes définies dans sa classe parente, tout en lui permettant de définir ses propres fonctionnalités supplémentaires. Cela favorise la réutilisabilité du code en évitant la duplication et en encourageant la création de relations logiques entre les classes.
En PHP, l’héritage est mis en œuvre à l’aide du mot-clé **extends**.
Exemple :
```php
class Animal {
    public function speak() {
        echo "Animal speaks";
    }
}

class Dog extends Animal {
    public function bark() {
        echo "Dog barks";
    }
}

$dog = new Dog();
$dog->speak();
$dog->bark();
```
## Polymorphisme:
Le polymorphisme est la capacité pour des objets de différentes classes à répondre de manière différente à la même action ou au même appel de méthode. Cela signifie que vous pouvez appeler une méthode sur un objet sans connaître sa classe spécifique, et l’objet réagira de manière appropriée en fonction de sa propre implémentation de cette méthode.
Par exemple, supposons que nous ayons une classe parente Forme avec une méthode calculerSurface() :
```php
class Forme {
    public function calculerSurface() {
        // Implémentation par défaut pour le calcul de la surface
    }
}
```
Nous pouvons créer des classes enfants telles que Cercle et Rectangle qui héritent de la classe parente Forme et redéfinissent la méthode calculerSurface() avec leur propre implémentation spécifique :
```php
class Cercle extends Forme {
    public function calculerSurface() {
        $surface = pi() * pow($this->rayon, 2);
        echo "La surface du cercle est : $surface";
    }
}

class Rectangle extends Forme {
    public function calculerSurface() {
        $surface = $this->longueur * $this->largeur;
        echo "La surface du rectangle est : $surface";
    }
}
```
Lorsque vous appelez la méthode calculerSurface() sur un objet de type Cercle, le calcul de la surface du cercle est effectué, et lorsque vous l’appelez sur un objet de type Rectangle, le calcul de la surface du rectangle est effectué. Cela montre comment chaque objet réagit différemment à la même méthode, ce qui est le principe du polymorphisme.

## Abstraction
L’abstraction consiste à représenter les caractéristiques essentielles d’un objet sans se préoccuper des détails concrets de sa mise en œuvre. En d’autres termes, l’abstraction permet de définir une interface commune pour un ensemble d’objets similaires, en isolant les détails spécifiques dans les classes concrètes.
```php
abstract class Vehicle {
    abstract public function move();

    public function fuelType() {
        echo "This vehicle uses fuel.\n";
    }
}

class Car extends Vehicle {
    public function move() {
        echo "Car is moving.\n";
    }
}

$car = new Car();
$car->move(); // Outputs: Car is moving.
$car->fuelType(); // Outputs: This vehicle uses fuel.
```
## Interface:
Les interfaces en PHP permettent de définir des méthodes communes que les classes doivent implémenter. Elles servent de contrat pour garantir que les classes qui les implémentent offrent certaines fonctionnalités. Une interface ne contient que la signature des méthodes (nom et paramètres), sans fournir d’implémentation concrète. Donc, lorsque vous créez une interface, vous déclarez essentiellement un ensemble de méthodes, mais vous ne fournissez pas d’implémentation pour ces méthodes.
Ensuite, lorsque vous créez une classe qui implémente cette interface, vous devez fournir une implémentation concrète pour chaque méthode définie dans l’interface. Cela garantit que votre objet respecte le contrat défini par l’interface et offre les fonctionnalités attendues.
```php
interface Animal {
    public function parler();
}

class Chien implements Animal {
    public function parler() {
        echo "Le chien aboie.";
    }
}

class Chat implements Animal {
    public function parler() {
        echo "Le chat miaule.";
    }
}
```
## Traits:
Les traits sont un mécanisme de réutilisation de code en PHP qui permettent de définir des méthodes qui peuvent être incluses dans plusieurs classes. Ils offrent une alternative à l’héritage multiple, permettant ainsi d’éviter certains des problèmes liés à la complexité de l’héritage.
### Déclaration et utilisation de traits en POO
Pour déclarer un trait, utilisez le mot-clé **trait**, suivi du nom du trait et de son contenu, qui consiste généralement en des méthodes. Pour utiliser un trait dans une classe, utilisez le mot-clé **use** suivi du nom du trait.
```php
trait UserFunctions {
    public function login() {
        // Logique de connexion ici
        echo "Connecté avec succès!";
    }

    public function logout() {
        // Logique de déconnexion ici
        echo "Déconnecté avec succès!";
    }

    public function checkStatus() {
        // Logique de vérification du statut ici
        echo "Statut vérifié!";
    }
}

class User {
    use UserFunctions;
}

class Admin {
    use UserFunctions;
    // Les administrateurs peuvent avoir des fonctionnalités supplémentaires...
}

// Utilisation
$user = new User();
$user->login(); // Affichera "Connecté avec succès!"

$admin = new Admin();
$admin->logout(); // Affichera "Déconnecté avec succès!"
```
## Autoload:
L’autoload en PHP est un mécanisme qui permet de charger automatiquement les classes lorsqu’elles sont utilisées pour la première fois dans votre code, sans avoir à les inclure manuellement avec require ou include. Cela rend la gestion des dépendances de classe beaucoup plus facile et évite d’avoir à écrire des tonnes d’instructions require_once dans chaque fichier.
Voici un exemple concret pour illustrer comment fonctionne l’autoload. Supposons que nous ayons une classe MaClasse définie dans un fichier MaClasse.php:
```php
// MaClasse.php
class MaClasse {
    public function __construct() {
        echo "Instance de MaClasse créée !";
    }
}
```
Maintenant, dans un autre fichier où nous voulons utiliser cette classe sans l’inclure manuellement, nous pouvons utiliser l’autoload :
```php
// index.php
spl_autoload_register(function ($classe) {
    // Convertir le nom de la classe en chemin de fichier
    $chemin = str_replace('\\', DIRECTORY_SEPARATOR, $classe) . '.php';

    // Inclure le fichier de classe si celui-ci existe
    if (file_exists($chemin)) {
        require_once $chemin;
    }
});

// Maintenant, lorsque nous instancions MaClasse, elle sera automatiquement chargée
$objet = new MaClasse(); // Affichera "Instance de MaClasse créée !"
```
Dans cet exemple, la fonction spl_autoload_register() enregistre une fonction d’autoload anonyme qui sera appelée chaque fois qu’une classe est utilisée mais n’est pas encore définie. Cette fonction convertit alors le nom de la classe en un chemin de fichier, puis vérifie si ce fichier existe. Si c’est le cas, elle l’inclut automatiquement avec require_once. Ainsi, lorsque nous instancions MaClasse dans index.php, PHP charge automatiquement le fichier MaClasse.php et nous pouvons utiliser la classe sans problème.

## Namespaces:
Les namespaces sont des containers virtuels permettant d’organiser les classes, interfaces, fonctions et constantes en groupes logiques. Ils aident à éviter les collisions de noms entre différentes parties de votre code et facilitent le partage de code entre différentes parties d’une application.
```php
// Déclaration d'un namespace
namespace MonProjet\Vehicules;

class Voiture {
    public function demarrer() {
        echo "La voiture démarre !";
    }
}

// Utilisation de la classe Voiture du namespace MonProjet\Vehicules
$voiture = new Voiture();
$voiture->demarrer(); // Affichera "La voiture démarre !"
```
Dans cet exemple, nous avons déclaré un namespace MonProjet\Vehicules en utilisant le mot-clé namespace. Ensuite, nous avons défini une classe Voiture à l’intérieur de ce namespace. Lorsque nous utilisons la classe Voiture, nous l’appelons en utilisant son nom complet, c’est-à-dire MonProjet\Vehicules\Voiture.

## Méthodes Magiques :
Les méthodes magiques en programmation orientée objet (POO) sont des méthodes spéciales qui ont des noms préfixés par deux caractères de soulignement __. Elles sont appelées automatiquement par le langage de programmation lors de certaines interactions avec les objets, sans que vous ayez besoin de les appeler explicitement dans votre code.

Par exemple, lorsque vous créez un nouvel objet en utilisant le mot-clé **new**, PHP sait automatiquement qu’il doit appeler la méthode magique **__construct()** pour effectuer toute initialisation nécessaire de l’objet. De même, lorsque vous utilisez l’objet dans un contexte de chaîne de caractères.
La méthode **__toString()** est appelée automatiquement lorsqu’un objet est utilisé dans un contexte de chaîne de caractères, par exemple lorsqu’il est passé à la fonction echo.
```php
class MaClasse {
    public function __toString() {
        return "Ceci est une représentation de l'objet MaClasse.";
    }
}

$objet = new MaClasse();
echo $objet;
```
## Gestion des Erreurs et Exceptions :
En POO, une exception est une classe spéciale utilisée pour signaler des erreurs ou des conditions exceptionnelles dans votre code. Les exceptions permettent de séparer la logique normale de la gestion des erreurs, ce qui rend votre code plus clair et plus facile à maintenir. 
```php
class MonException extends Exception {
    // Personnalisation de la classe d'exception
}
class MaClasse {
    public function faireQuelqueChose($parametre) {
        if ($parametre === null) {
            throw new MonException("Le paramètre ne peut pas être null.");
        }
        // Autre logique de traitement...
    }
}

// Utilisation
$objet = new MaClasse();
try {
    $objet->faireQuelqueChose(null);
} catch (MonException $e) {
    echo "Erreur : " . $e->getMessage();
}
``` 
Dans cet exemple, la méthode faireQuelqueChose() de la classe MaClasse lève une exception de type MonException si le paramètre passé est null. Nous utilisons ensuite un bloc try…catch pour attraper cette exception et afficher un message d’erreur approprié.
Vous pouvez gérer les exceptions ou les erreurs à l’aide de blocs try…catch, qui vous permettent d’attraper et de gérer les exceptions qui sont levées dans un bloc try.
```php
try {
    // Code susceptible de générer une exception
    throw new MonException("Une erreur s'est produite !");
} catch (MonException $e) {
    // Gestion de l'exception
    echo "Exception attrapée : " . $e->getMessage();
} finally {
    // Bloc exécuté quel que soit le résultat
    echo "Fin du traitement.";
}
```
Dans cet exemple, le bloc finally est exécuté quel que soit le résultat de l’exécution du bloc try. Cela permet d’exécuter des opérations de nettoyage ou de finalisation, même en cas d’exception.

## Principes SOLID:
Les principes SOLID sont un ensemble de cinq principes de conception de logiciels qui visent à rendre le code plus compréhensible, flexible et maintenable. Voici un aperçu de chacun de ces principes et comment les appliquer en PHP.

### 1. Single Responsibility Principle (SRP):
Un objet ne doit avoir qu'une seule responsabilité. Chaque classe doit avoir une seule raison de changer.

```php
class Order {
    private $items = [];

    public function addItem($item) {
        $this->items[] = $item;
    }

    public function getTotal() {
        // Calcul du total de la commande
    }
}

class OrderRepository {
    public function save(Order $order) {
        // Code pour sauvegarder la commande dans la base de données
    }
}
``` 
Ici, la classe Order gère les opérations relatives à la commande, tandis que OrderRepository est responsable de la persistance.

### 2. Open/Closed Principle (OCP):
Les entités logicielles doivent être ouvertes à l'extension mais fermées à la modification.
```php
interface PaymentMethod {
    public function pay($amount);
}

class CreditCardPayment implements PaymentMethod {
    public function pay($amount) {
        // Traitement du paiement par carte de crédit
    }
}

class PayPalPayment implements PaymentMethod {
    public function pay($amount) {
        // Traitement du paiement via PayPal
    }
}
```
Vous pouvez ajouter de nouveaux modes de paiement sans modifier le code existant en implémentant l'interface PaymentMethod.

### 3. Liskov Substitution Principle (LSP):
Les objets d'une classe dérivée doivent pouvoir remplacer les objets de la classe de base sans altérer le fonctionnement du programme.
```php
class Rectangle {
    protected $width;
    protected $height;

    public function setWidth($width) {
        $this->width = $width;
    }

    public function setHeight($height) {
        $this->height = $height;
    }

    public function getArea() {
        return $this->width * $this->height;
    }
}

class Square extends Rectangle {
    public function setWidth($width) {
        $this->width = $width;
        $this->height = $width;
    }

    public function setHeight($height) {
        $this->height = $height;
        $this->width = $height;
    }
}
```
Ici, Square respecte le LSP car il peut remplacer Rectangle sans modifier le comportement attendu.

### 4. Interface Segregation Principle (ISP):
Les clients ne devraient pas être forcés de dépendre d'interfaces qu'ils n'utilisent pas. Une interface unique doit être spécifique à un groupe de méthodes cohérentes.
```php
interface Worker {
    public function work();
}

interface Eater {
    public function eat();
}

class HumanWorker implements Worker, Eater {
    public function work() {
        // Code pour travailler
    }

    public function eat() {
        // Code pour manger
    }
}

class RobotWorker implements Worker {
    public function work() {
        // Code pour travailler
    }
}
```
Les robots n'ont pas besoin de la méthode eat(), donc ils implémentent uniquement l'interface Worker.

### 5. Dependency Inversion Principle (DIP):
Les modules de haut niveau ne devraient pas dépendre des modules de bas niveau. Tous deux devraient dépendre d'abstractions. Les abstractions ne devraient pas dépendre des détails. Les détails devraient dépendre des abstractions.
```php
interface DatabaseConnection {
    public function connect();
}

class MySQLConnection implements DatabaseConnection {
    public function connect() {
        // Connexion à MySQL
    }
}

class PasswordReminder {
    private $dbConnection;

    public function __construct(DatabaseConnection $dbConnection) {
        $this->dbConnection = $dbConnection;
    }

    public function remind() {
        // Code pour rappeler le mot de passe
    }
}
```
Le PasswordReminder dépend d'une abstraction DatabaseConnection plutôt que d'une classe spécifique MySQLConnection.
Ces principes vous aideront à créer un code PHP plus propre, plus modulaire et plus facile à maintenir. En suivant SOLID, vous réduirez les dépendances et augmenterez la réutilisabilité de votre code.

<?php


$server = 'localhost';
$db = 'exo202';
$user = 'root';
$pass = '';

// TODO Votre code ici.
try {
    $db = new PDO("mysql:host=$server;dbname=$db;charset=utf8", $user, $pass);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

/**
 * 1. Commencez par importer le script SQL disponible dans le dossier SQL.
 * 2. Connectez vous à la base de données blog.
 */

/**
 * 3. Sans utiliser les alias, effectuez une jointure de type INNER JOIN de manière à récupérer :
 *   - Les articles :
 *     * id
 *     * titre
 *     * contenu
 *     * le nom de la catégorie ( pas l'id, le nom en provenance de la table Categorie ).
 *
 * A l'aide d'une boucle, affichez chaque ligne du tableau de résultat.
 */
    $request = $db->prepare("SELECT article.id, article.title, article.content, categorie.name
                               FROM article
                               INNER JOIN categorie ON category_fk = categorie.id");
    $request->execute();
    echo "<pre>";  print_r($request->fetchAll());
    echo "</pre>";

/**
 * 4. Réalisez la même chose que le point 3 en utilisant un maximum d'alias.
 */

// TODO Votre code ici.
    $request = $db->prepare("SELECT ar.id, ar.title, ar.content, ca.name
                               FROM article as ar
                               INNER JOIN categorie as ca ON category_fk = ca.id");
    $request->execute();
    echo "<pre>";  print_r($request->fetchAll());
    echo "</pre>";
/**
 * 5. Ajoutez un utilisateur dans la table utilisateur.
 *    Ajoutez des commentaires et liez un utilisateur au commentaire.
 *    Avec un LEFT JOIN, affichez tous les commentaires et liez le nom et le prénom de l'utilisateur ayant écris le comentaire.
 */

// TODO Votre code ici.
    $sql ="INSERT INTO utilisateur (firstName, lastName, mail, password)
           VALUES ('firstname', 'lastname', 'monmail@moi.pt', '1234azer')
           ";

    $result = $db->exec($sql);
    $request = $db->prepare("SELECT auteur.firstName, auteur.lastName, article.title
                                   FROM auteur
                                   LEFT JOIN article ON auteur.id = article.author_fk");
    $request->execute();
    echo "<pre>";  print_r($request->fetchAll());
    echo "</pre>";

}
catch (PDOException $e){
    die($e->getMessage());
}
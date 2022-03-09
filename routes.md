# Routes

## Sprint 1

| URL | HTTP Method | Controller | Method | Title | Content | Comment |
|--|--|--|--|--|--|--|
| `/` | `GET` | `MainController` | `home` | Dans les shoe | 5 categories | - |
| `/public-url/with-sub-folder/[and-dynamic-part]` | `GET` ou `POST` | `ControllerName` | `methodName` | Titre de la page | Description of page's content | Explain here the dynamics parts of your URL (`[]`) |
| `/` | `GET` | `MainController` | `home` | Page d'accueil | Page d'accueil avec les 5 catégories | - |
| `/catalogue/categorie/[id]` | `GET` | `CatalogController` | `category` | Page de catégorie | Page listant les produits d'une catégorie | `[id]` correspond à l'identifiant de la catégorie |
| `/mentions-legales` | `GET` | `MainController` | `legalMention` | Page Mention légales | - | - |
| `/catalogue/categorie/[12]` | `GET` | `CatalogController` | `category` | Page de catégorie 12 | Page listant les produits d'une catégorie | `[12]` correspond à l'identifiant de la catégorie |
| `/catalogue/type/[40]` | `GET` | `CatalogController` | `type` | Page de type | Page listant les produits d'un type | `[40]` correspond à l'identifiant du type |
| `/catalogue/marque/[2]` | `GET` | `CatalogController` | `marque` | Page de marque | Page listant les produits d'une marque | `[2]` correspond à l'identifiant de la marque |
| `/catalogue/produit/[4]` | `GET` | `CatalogController` | `produit` | Page de produit | Page listant les produits d'un produit | `[4]` correspond à l'identifiant du produit |

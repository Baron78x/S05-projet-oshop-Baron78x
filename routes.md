# Routes

## Sprint 1

| URL | HTTP Method | Controller | Method | Title | Content | Comment |
|--|--|--|--|--|--|--|
| `/` | `GET` | `MainController` | `home` | Dans les shoe | 5 categories | - |
| `/public-url/with-sub-folder/[and-dynamic-part]` | `GET` ou `POST` | `ControllerName` | `methodName` | Titre de la page | Description of page's content | Explain here the dynamics parts of your URL (`[]`) |
| `/` | `GET` | `MainController` | `home` | Page d'accueil | Page d'accueil avec les 5 catégories | - |
| `/catalogue/categorie/[id]` | `GET` | `CatalogController` | `category` | Page de catégorie | Page listant les produits d'une catégorie | `[id]` correspond à l'identifiant de la catégorie |
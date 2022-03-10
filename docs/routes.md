# Routes

## Sprint 1

| URL | HTTP Method | Controller | Method | Title | Content | Comment |
|--|--|--|--|--|--|--|
| `/` | `GET` | `MainController` | `home` | Page d'accueil | Page d'accueil avec les 5 catégories | - |
| `/mentions-legales/` | `GET` | `MainController` | `legal` | Page mentions légales | Mentions légales du site, RGPD | - |
| `/catalogue/categorie/[id]` | `GET` | `CatalogController` | `category` | Page de catégorie | Page listant les produits d'une catégorie | `[id]` correspond à l'identifiant de la catégorie |
| `/catalogue/type/[id]` | `GET` | `CatalogController` | `type` | Page de type de produit | Page listant les produits d'un certain type | `[id]` correspond à l'identifiant du type de produit |
| `/catalogue/marque/[id]` | `GET` | `CatalogController` | `brand` | Page de marque | Page listant les produits d'une marque | `[id]` correspond à l'identifiant de la marque |
| `/catalogue/produit/[id]` | `GET` | `CatalogController` | `product` | Page produit | Page affichant les détails d'un produit | `[id]` correspond à l'identifiant du produit |

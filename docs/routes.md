# Routes

## Sprint 1

| URL | HTTP Method | Controller | Method | Title | Content | Comment |
|--|--|--|--|--|--|--|
| `/` | `GET` | `MainController` | `home()` | oShop | 5 categories | - |
| `/mentions-legales` | `GET` | `MainController` | `legalNotice()` | Legal notice | - | - |
| `/catalogue/categorie/[id]` | `GET` | `CatalogController` | `category()` | Category name | Display products for the given category | id = identifier of the category to display |

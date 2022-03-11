# Requêtes SQL

## Récupérer tous les produits (findAll())

```sql
SELECT * FROM product
```

## Récupérer le produit ayant un id donné (#2) (find())

```sql
SELECT *
FROM product
WHERE id = 2
```

## Récupérer tous les types de produits (findAll())

```sql
SELECT * FROM `type`
```

## Récupérer le type de produit ayant un id donné (#2) (find())

```sql
SELECT *
FROM `type`
WHERE id = 2
```

## Récupérer toutes les marques (findAll())

```sql
SELECT * FROM `brand`
```

## Récupérer la marque ayant un id donné (#2) (find())

```sql
SELECT *
FROM `brand`
WHERE id = 2
```

## Récupérer toutes les catégories (findAll())

```sql
SELECT * FROM `category`
```

## Récupérer la catégorie ayant un id donné (#2) (find())

```sql
SELECT *
FROM `category`
WHERE id = 2
```

## récupérer la liste des catégories mises en avant sur la page d'accueil

```sql
SELECT * 
FROM `category` 
WHERE `home_order` > 0 
ORDER BY `home_order` 
LIMIT 5
```

## récupérer la liste des produits qui appartiennent à une catégorie donnée

```sql
SELECT *
FROM `product`
WHERE `category_id` = 2
```

## récupérer la liste des produits qui appartiennent à une marque donnée

```sql
SELECT *
FROM `product`
WHERE `brand_id` = 2
```

## récupérer la liste des produits qui appartiennent à un type de produit donné

```sql
SELECT *
FROM `product`
WHERE `type_id` = 2
```

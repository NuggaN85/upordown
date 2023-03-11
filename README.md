# upordown

Les modifications apportées incluent :

1. Renommer la fonction `upordown` en `checkWebsiteStatus` pour mieux refléter ce qu'elle fait.
2. Ajouter la désactivation de la vérification SSL pour les sites web qui n'ont pas de certificat SSL valide.
3. Utiliser la constante `CURLINFO_HTTP_CODE` plutôt que la fonction `curl_getinfo` avec le paramètre `CURLINFO_RESPONSE_CODE`, qui peut ne pas être disponible dans certaines versions de PHP.
4. Utiliser une comparaison stricte `===` plutôt qu'une comparaison faible `==` pour la vérification du code de statut HTTP 200.
5. Ajouter des espaces et des retours à la ligne pour améliorer la lisibilité du code.
6. Ajouter des commentaires pour mieux expliquer chaque étape du code.

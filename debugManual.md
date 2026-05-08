Routes de l'api:
https://projetl2.localhost:8443/api/decks/ affichage des decks

    [
    {
    "id": 10,
    "titre": "Deck 1",
    "description": "Description du deck 1"
    },
    {
    "id": 11,
    "titre": "Deck 2",
    "description": "Description du deck 2"
    },
    {
    "id": 13,
    "titre": "Nouveau deck",
    "description": "Deck de test"
    }
    ]
    
    https://projetl2.localhost:8443/api/decks/12 affichage des infos du deck 12 avec le nombre de cartes sans detail de celles ci
    
    {
    "id": 11,
    "titre": "Deck 2",
    "description": "Description du deck 2",
    "flashcards_count": 2,
    "tags": [
        {
            "id": 1,
            "nom": "Programmation"
        },
        {
            "id": 2,
            "nom": "JavaScript"
        }
    ]
    }
    
    https://projetl2.localhost:8443/api/decks/12/flashcards affichage d'uniquement les flashcards contenues dans ce deck
    
    [
    {
    "id": 12,
    "question": "Question 2 ?",
    "answer": "Réponse 2",
    "difficulte": 1
    },
    {
    "id": 18,
    "question": "Question 8 ?",
    "answer": "Réponse 8",
    "difficulte": 2
    }
    ]
    
    
    
    Ajout d'une flashcard via l'url (terminal bash)(-k ignore le certificat https invalide et -X precise la methode car c'est GET par default)
    
    curl -k -X POST https://projetl2.localhost:8443/api/flashcards \
    -H "Content-Type: application/json" \
    -d '{
    "question": "question",
    "answer": "reponse",
    "deck_id": 12,
    "difficulte": 2
    }'
    
    
    Suppression d'une carte:
    
    url -k -X DELETE https://projetl2.localhost:8443/api/flashcards/23
    
    
    modif d'une carte !! possible de modif 1 champs seulement
    
    curl -k -X PATCH https://projetl2.localhost:8443/api/flashcards/20 \
    -H "Content-Type: application/json" \
    -d '{
    "question":"modifiée",
    "answer":"modifiée",
    "difficulte":2,
    "deck_id":11
    }'
    
    
    
    ajout d'un deck
    
    curl -k -X POST https://projetl2.localhost:8443/api/decks -H "Content-Type: application/json" -d '{"titre":"deck","description":"test"}'
    
    
    Suppression d'un deck (!! supprime aussi les flashcards contenues dedans)
    
    curl -k -X DELETE https://projetl2.localhost:8443/api/decks/12
    
    
    modif d'un deck !! possible de modifier 1 seul champs 
    
    curl -k -X PATCH https://projetl2.localhost:8443/api/decks/12 \
    -H "Content-Type: application/json" \
    -d '{"titre":"Titre modifié","description":"Desc modifiée"}'

User
├── role
├── nom
├── email
└── mot de passe

Category
├── id
└── nom

Ticket
├── id
├── nom
├── description
├── id_categorie
├── id_statut
├── priorite
├── créé par
└── assigné à

Comment
├── id
├── contenu
├── ticket
├── auteur
└── date/heure

TicketStatusHistory
├── id
├── ticket
├── ancien statut
├── nouveau statut
├── utilisateur
└── date et heure
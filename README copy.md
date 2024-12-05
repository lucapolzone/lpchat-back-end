FRONT-END (Vue.js + Vite + Pinia + Tailwind CSS)

frontend/
├── public/                            # File pubblici
│   └── index.html                     # Il file HTML principale
├── src/
│   ├── assets/                        # File statici (immagini, icone, etc.)
│   ├── components/                    # Componenti principali di Vue.js
│   │   ├── Chat.vue                   # Componente della chat
│   │   └── NotificationBadge.vue      # Componente per le notifiche
│   ├── store/                         # Pinia store
│   │   └── auth.js                    # **AGGIUNGI/CREA un nuovo store per l'autenticazione (Pinia)**
│   │   └── messages.js                # Store per messaggi e notifiche
│   ├── views/                         # Pagine principali
│   │   ├── Dashboard.vue              # Dashboard principale
│   │   └── ChatRoom.vue               # Pagina della chat
│   ├── components/                    # Aggiungi il componente di login
│   │   └── Login.vue                  # **CREA il componente Login.vue** (dove gestire il login e la checkbox "Ricordami")
│   ├── App.vue                        # Componente root dell'app
│   ├── main.js                        # Entry point di Vue.js
│   ├── style/                         # Folder per il CSS/Tailwind
│   │   └── index.css                  # File CSS principale (per Tailwind e stili personalizzati)
├── package.json                       # Dipendenze e script di build
├── vite.config.js                     # Configurazione di Vite
└── .env                               # Variabili d'ambiente (opzionale, ma utile per le chiavi API, etc.)

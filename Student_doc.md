# SYSTEM DESCRIPTION:

**DECIMO A CALCETTO** is a digital platform designed to manage and organize football (soccer) matches among players, team organizers, and referees. The system provides authentication, match search, and team organization functionalities, ensuring easy coordination between participants. While the database is currently used for authentication, future updates will include match data persistence.

# USER STORIES:

### Player
1) As a player, I want to search for available matches so that I can find and join a game near me.
2) As a player, I want to filter matches by location, time, and skill level so that I can find a game that suits my preferences.
3) As a player, I want to join a match instantly so that I can secure my spot in a game.
4) As a player, I want to track my past matches and stats so that I can review my playing history.
5) As a player, I want to receive reminders for upcoming matches so that I don’t forget my scheduled games.
6) As a player, I want to report inappropriate behavior or unfair play so that I can help maintain a fair and safe community.

### Team Organizer (Player)
7) As a team organizer, I want to create a match so that I can invite players and set up a game.
8) As a team organizer, I want to specify the number of players needed so that I can track team composition.
9) As a team organizer, I want to invite specific players so that I can build a well-balanced team.
10) As a team organizer, I want to receive notifications when my match is full so that I know when the game is ready.
11) As a team organizer, I want to assign a referee to my match so that we have an official to enforce the rules.

### Referee
12) As a referee, I want to search for matches that need a referee so that I can find games to officiate.
13) As a referee, I want to see match details before accepting a job so that I can choose games that fit my schedule and expertise.
14) As a referee, I want to receive match confirmations and notifications so that I stay informed about my assigned games.
15) As a referee, I want to update the match results so that players can review scores and outcomes.
16) As a referee, I want to report rule violations or misconduct so that I can maintain fairness in the game.
17) As a referee, I want to track my past officiated matches so that I can review my refereeing history.

### General
18) As a user, I want to edit my profile (name, contact info, skill level, etc.) so that my information stays up to date.
19) As a user, I want to log in using social media or email so that I can access my account easily.
20) As a user, I want to reset my password in case I forget it.
21) As a user, I want to contact customer support in case I need help using the system.
22) As a user, I want to report technical issues or bugs so that developers can fix them.

# CONTAINERS:

## CONTAINER_NAME: Frontend

### DESCRIPTION:
Serves the main user interface for players, team organizers, and referees. It is responsible for user interactions, match visualization, and form submissions for authentication.

### PORTS:
5500:80

### PERSISTENCE EVALUATION:
The frontend container does not include a database.

### EXTERNAL SERVICES CONNECTIONS:
The frontend communicates with the backend container via HTTP for data retrieval and submission.

### MICROSERVICE: frontend
- TYPE: frontend
- DESCRIPTION: Serves static HTML, CSS, and JavaScript files for the user interface.


---

## CONTAINER_NAME: Backend

### DESCRIPTION:
Handles authentication, player management, team organization, referee coordination, and user operations. This container will also manage match data in the future.

### PORTS:
8000:80

### PERSISTENCE EVALUATION:
The backend container uses a MySQL database to store user and authentication data.

### EXTERNAL SERVICES CONNECTIONS:
Currently, the backend connects only to the local MySQL container.

### MICROSERVICES:

#### MICROSERVICE: auth
- TYPE: backend
- DESCRIPTION: Handles user registration, login, and password management.
- USER STORIES: 19, 20
- DATABASE: True
- TECHNOLOGY: PHP, MySQL.

#### MICROSERVICE: player
- TYPE: backend
- DESCRIPTION: Manages player profiles, match searching, filtering, and reports.
- USER STORIES: 1, 2, 3, 4, 5, 6
- DATABASE: True

#### MICROSERVICE: team
- TYPE: backend
- DESCRIPTION: Supports creation and management of matches by team organizers.
- USER STORIES: 7, 8, 9, 10, 11
- DATABASE: False

#### MICROSERVICE: referee
- TYPE: backend
- DESCRIPTION: Handles referee match selection, results updating, and reporting.
- USER STORIES: 12, 13, 14, 15, 16, 17
- DATABASE: False

#### MICROSERVICE: user
- TYPE: backend
- DESCRIPTION: Manages user profiles, contact forms, and issue reports.
- USER STORIES: 18, 21, 22
- DATABASE: True

#### MICROSERVICE: matches
- TYPE: backend
- DESCRIPTION: Manages match scheduling and participation. Database support planned for future versions.
- USER STORIES: 1, 2, 3, 7, 8, 12, 13, 14
- DATABASE: Not defined

---

## CONTAINER_NAME: MySQL

### DESCRIPTION:
Stores authentication and user data for the backend services. Future versions will include match and statistics data.

### PORTS:
3306:3306

### PERSISTENCE EVALUATION:
The MySQL container stores persistent data in the mounted Docker volume `db_data`.

### EXTERNAL SERVICES CONNECTIONS:
Connected exclusively to the backend container.

---

# SYSTEM ARCHITECTURE SUMMARY

The **Config** platform uses a three-tier architecture composed of:
- A **Frontend** layer for the user interface.
- A **Backend (PHP)** layer for logic, authentication, and data handling.
- A **MySQL Database** layer for persistent storage.

Communication between services occurs via Docker networking, ensuring modularity and scalability for future microservices expansion.

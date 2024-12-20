# Library manager

Library-manager is a website for managing a library. It allows users to browse books.

## Getting Started

Follow these steps to set up and run the project.

### Prerequisites

- Docker
- Composer
- Symfony CLI

### Installation

1. **Clone the repository:**
```sh
  git clone https://github.com/pawfs/library-manager.git
  cd library-manager
```

2. **Install dependencies:**
```sh
  composer install
```

3. **Start Docker:**
  Make sure Docker is running on your machine. (Open docker desktop)

4. **Build and start the containers:**
```sh
  docker-compose up -d
```
    To make sure the database exists, you can run:
```sh
  symfony console doctrine:database:create --if-not-exists
```

5. **Run database migrations:**
```sh
  symfony console doctrine:migrations:migrate
```

6. **Start the Symfony server:**
```sh
  symfony serve
```

### Access the Application

Open your browser and navigate to `http://localhost:8000`.

### After making a change to the database (like changes in entities)
  ```sh
  symfony console make:migration
  symfony console doctrine:migrations:migrate
  ```

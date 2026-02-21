pipeline {
    agent any

    environment {
        COMPOSE_BASE = "docker-compose.yml"
        COMPOSE_PROD = "docker-compose.prod.yml"
    }

    stages {

        stage('Stop containers') {
            steps {
                sh """
                    docker compose \
                    -f $COMPOSE_BASE \
                    -f $COMPOSE_PROD \
                    down || true
                """
            }
        }

        stage('Build and Start containers') {
            steps {
                sh """
                    docker compose \
                    -f $COMPOSE_BASE \
                    -f $COMPOSE_PROD \
                    up -d --build
                """
            }
        }

        stage('Verify containers') {
            steps {
                sh 'docker ps'
            }
        }
    }

    post {
        success {
            echo 'Deploy realizado com sucesso 🚀'
        }
        failure {
            echo 'Falha no deploy ❌'
        }
    }
}

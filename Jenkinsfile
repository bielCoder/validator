pipeline {
    agent any

    stages {

        stage('Stop containers') {
            steps {
                sh 'docker compose -f docker-compose.base.yml down || true'
            }
        }

        stage('Build and Start containers') {
            steps {
                sh 'docker compose -f docker-compose.base.yml up -d --build'
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

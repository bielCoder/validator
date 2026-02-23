pipeline {
    agent any

    stages {

        stage('Build containers') {
            steps {
                sh 'docker compose down || true'
                sh 'docker compose up -d --build'
            }
        }

        stage('Verify containers') {
            steps {
                sh 'docker ps'
            }
        }
    }
}

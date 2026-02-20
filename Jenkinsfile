pipeline {
    agent any

    stages {
        stage('Checkout') {
            steps {
                git 'git@github.com:bielCoder/validator.git'
            }
        }

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

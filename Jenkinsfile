pipeline {
    agent any

    environment {
        VM_HOST = '10.0.2.15'
        VM_USER = 'gabriel'
        APP_PATH = '/home/gabriel/Project/validator'
        BRANCH = 'develop'
    }

    stages {

        stage('Deploy') {
            steps {
                sh """
                    ssh -o StrictHostKeyChecking=no ${VM_USER}@${VM_HOST} '
                        cd ${APP_PATH} &&
                        git pull origin ${BRANCH} &&
                        docker compose -f docker-compose.base.yml down || true &&
                        docker compose -f docker-compose.base.yml up -d --build
                    '
                """
            }
        }

        stage('Verify') {
            steps {
                sh """
                    ssh -o StrictHostKeyChecking=no ${VM_USER}@${VM_HOST} '
                        docker ps
                    '
                """
            }
        }
    }

    post {
        success {
            echo 'Deploy automático realizado com sucesso 🚀'
        }
        failure {
            echo 'Falha no deploy ❌'
        }
    }
}
pipeline {
    agent any

    environment {
        def test_path = 'application/tests'
        def devRootDir = '/home/swift/public_html'
        def project_path = 'lamp-swift-project'
        
    }

    stages {
        stage('Cloning From Feature Branch') {
            steps {
                git branch: 'feature', url: 'https://github.com/abdelrhman-abdelazim/lamp-swift-project'
            }
        }

        stage('Unit Tests') {
            // change current directory
            steps {
                // sh'cd ${project_path}'
                sh'cd ${test_path}'
                sh'sudo ./phpunit.phar'
            }
        
        }
        
        stage('Integrating With Integration Branch') {
            steps {
                sh'git checkout feature'
                sh'git pull'
                sh'git checkout integration'
                sh'git merge feature'
            }
        }

        stage('Push To Integration Branch') {
            steps {
                withCredentials([usernamePassword(credentialsId: 'd5778a21-d821-4caf-bd07-98b347453711', passwordVariable: 'GIT_PASSWORD', usernameVariable: 'GIT_USER')]) {
                    sh'git checkout integration'
                    sh'git push origin integration'
                    // sh('git push https://${GIT_USER}:${GIT_PASSWORD}@https://github.com/abdelrhman-abdelazim/lamp-swift-project --tags')
                }
            }
        }

        stage('Cloning In Dev Machine Using Remote ssh') {
            agent { label 'webdev_slave' }
            steps {
                sh'git clone -b integration https://github.com/abdelrhman-abdelazim/lamp-swift-project'
                sh'mv lamp-swift-project swift-project-${BUILD_NUMBER}'
                sh'ln -s swift-project-${BUILD_NUMBER} public_html'
                sh'chown -R swift.swift swift-project-${BUILD_NUMBER}'
            }
        }
    }
}



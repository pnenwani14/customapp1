//Jenkinsfile
node {
stage('Preparation') {
      //Installing kubectl in Jenkins agent
      sh 'curl -LO https://storage.googleapis.com/kubernetes-release/release/$(curl -s https://storage.googleapis.com/kubernetes-release/release/stable.txt)/bin/linux/amd64/kubectl'
  sh 'chmod +x ./kubectl && mv kubectl /usr/sbin && env'
  
//Clone git repository
  git url:'https://github.com/pnenwani14/customapp1.git'
   }

stage('Create App Build') {
      //Create Docker Image
      
  sh 'echo "This Step is for creating Application Build"'
  
   }
   
stage('Docker Image') {
      //Create Docker Image
      
  sh 'echo "This Step is for creating Docker Image"'
  
   }
   
stage('Deploy Container') {
 
      withKubeConfig([credentialsId: 'default', serverUrl: 'https://10.55.4.73']) {
      
		sh 'kubectl set image deployment/acs-deployment helloworld=pnenwani/hello-karbon --record'
		sh ' sleep 15 && kubectl get services'
		
		
	}
} }
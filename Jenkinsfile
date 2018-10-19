//Jenkinsfile
node {
stage('Preparation') {
      //Installing kubectl in Jenkins agent
      sh 'curl -LO https://storage.googleapis.com/kubernetes-release/release/$(curl -s https://storage.googleapis.com/kubernetes-release/release/stable.txt)/bin/linux/amd64/kubectl'
  sh 'chmod +x ./kubectl && mv kubectl /usr/sbin && env'
  sh 'env'
  
//Clone git repository
  git url:'https://github.com/pnenwani14/customapp1.git'
   }
stage('Deploy App') {
 
      withKubeConfig([credentialsId: 'default', serverUrl: 'https://10.55.4.73']) {
      
		sh 'kubectl replace -f deploy/hello-world.yaml --force'
		sh ' sleep 30 && kubectl get pods'
		sh ' kubectl get services'
     }
	
	}
}

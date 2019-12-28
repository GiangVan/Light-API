git config http.sslVerify false
git init
git add .
git commit -m "first commit"
git remote add origin https://github.com/GiangVan/Light-API.git
git push -u origin test
git config http.sslVerify true
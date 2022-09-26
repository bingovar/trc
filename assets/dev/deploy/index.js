const NodeSSH = require("./ssh");
const ssh = new NodeSSH();
const authData = require("./auth.json");
const util = require('util');
const exec = util.promisify(require('child_process').exec);
const fs = require("fs");
const path = require("path");

ssh.connect({
  host: authData.IP,
  username: authData.user,
  password: authData.password
}).then(async () => {
  try {
    //Compile
    const { stderr } = await exec("npm run webpackDeploy");
    if (stderr.length) throw stderr;
  
    //Check compiled files
    if (!fs.existsSync(path.resolve(__dirname, "tmp/dist"))) throw new Error("Scripts compile error");
  
    const gitResponse = await ssh.execCommands([{
      command: "git fetch",
    }, {
      command: "git reset --hard origin/master"
    }, {
      command: "rm -R dist",
      path: authData.webpackPath
    }], authData.serverPath);
    
    //Copy compiled files
    const compiledFilesStatus = await ssh.putDirectory(path.resolve(__dirname, "tmp/dist"), `${authData.serverPath}${authData.webpackPath}/dist`, {
      recursive: true,
      concurrency: 10,
      validate: function(itemPath) {
        const baseName = path.basename(itemPath)
        return baseName.substr(0, 1) !== '.'
      }
    });
  
    //Remove tmp folder
    fs.rmdirSync(path.resolve(__dirname, "tmp"), { recursive: true });
    
    if (gitResponse && compiledFilesStatus) console.log('\x1b[32m%s\x1b[0m', `Deploy success`);
  } catch (err) {
    console.error(err);
  } finally {
    ssh.dispose();
  }
});
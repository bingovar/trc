const {NodeSSH} = require("node-ssh");

class NodeSSH2 extends NodeSSH {
  async execCommands(commandsArray, basePath = "") {
    for (const commandItem of commandsArray) {
      const response = await this.execCommand(commandItem.command, {cwd: basePath + (commandItem.path ? commandItem.path : "")});
      
      if (response.stderr.length && response.stderr !== "Everything up-to-date" && response.code) {
        throw new Error(response.stderr);
      }
    }
    
    return true;
  }
}

module.exports = NodeSSH2;
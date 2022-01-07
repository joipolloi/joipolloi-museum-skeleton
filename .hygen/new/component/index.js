module.exports = {
  prompt: ({ inquirer }) => {

    const questions = [
      {
        type: 'input',
        name: 'component_name',
        message: 'What is the component name?',
      }
    ];

    return inquirer.prompt({
      type: 'select',
      name: 'theme',
      message: 'Theme?',
      choices: ['joipolloi'],
    }).then((answers) => {
         return inquirer.prompt(questions).then(extraAnswers => ({ ...answers, ...extraAnswers }));
    }).then((answers) => {
      const { theme, component_name } = answers;
      const path = `theme-src/${theme}/Components/${component_name}`;
      const absPath = `${path}`;
      return { ...answers, path, absPath, theme };
    });
  },
};

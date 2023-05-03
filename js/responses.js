function getBotResponse(input) {
    // Convert the input to lowercase and trim any whitespace
    const cleanedInput = input.toLowerCase().trim();
  
    // Define possible responses based on the input
    if (cleanedInput.includes('hello') || cleanedInput.includes('hi')) {
      return 'Hi there, how can I assist you today?';
    } else if (cleanedInput.includes('help') || cleanedInput.includes('assistance')) {
      return 'Sure, what do you need help with?';
    } else if (cleanedInput.includes('recommend') && cleanedInput.includes('restaurant')) {
      return 'There are many great restaurants in this area. Can you please provide more information, such as your preferred cuisine or budget?';
    } else {
      return 'I'm sorry, I didn't understand your request. Can you please rephrase your question or provide more information?';
    }
  }
  
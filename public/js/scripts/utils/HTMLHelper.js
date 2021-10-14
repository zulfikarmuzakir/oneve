const HTMLHelper = {
  toElement(html) {
    const htmlTrimed = html.trim();
    const tempParent = document.createElement('div');
    tempParent.innerHTML = htmlTrimed;

    return tempParent.childNodes[0];
  },
};

export default HTMLHelper;
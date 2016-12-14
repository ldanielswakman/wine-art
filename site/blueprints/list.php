title: List page

pages:
  template: section

fields:
  title:
    label: Title
    type:  text

  text:
    label: text
    type: markdown

  items:
    label: Items
    type: structure
    modalsize: large
    fields:
      title: 
        label: Title
        type: text
      image:
        label: Image
        type: image
      description:
        label: Description
        type: markdown

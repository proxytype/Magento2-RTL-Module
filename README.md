<table>
  <tr>
    <td> <img src="https://raw.githubusercontent.com/proxytype/Magento2-RTL-Module/main/Magneto.PNG"  alt="1"></td>
    <td><h1>RTL Module - 2.4.x</h1></td>
   </tr> 
</table>

RTL Module is a Magento module designed to facilitate Right-to-Left (RTL) language support within Magento-based e-commerce websites. It offers a comprehensive solution for enabling RTL directionality across various aspects of the frontend, including layout, styling, and content rendering. Through its configuration settings and layout directives, RTL Module enables administrators to seamlessly customize the appearance and behavior of their Magento stores to cater to RTL languages such as Arabic, Hebrew, and Persian. Leveraging its block classes and template files, the module dynamically adjusts CSS stylesheets and layout components to ensure optimal user experience for RTL-oriented audiences. RTL Module serves as a valuable tool for Magento merchants seeking to expand their market reach and enhance accessibility for diverse linguistic communities.

Download Rudenet/RTL to your code folder in Magento 2 (ensure that you maintain the folder structure, or the module will break).

Verify module exists:
```console
sudo bin/magento module:status
```

Enable the module:
```console
sudo bin/magento module:enable Rudenet_RTL
```
Flush cache and upgrade modules:
```console
sudo bin/magento setup:upgrade
```

# Module Structure

```
Block
   |
   --> RTL.php
etc
   |
   --> adminhtml
   |	   |
   |	   --> system.xml
   |
   --> moudle.xml
view
   |
   --> frontend
           |
           --> layout
           |      |
           |      --> default_head_blocks.xml
           |
           --> templates
           |      |
           |      --> rtl_css.phtml
	   |
           --> web
                  |
                  --> css
                         |
                         --> rtl.css
```

# Code Explanation 

## RTL.php

### Namespace and Class Declaration:
The `namespace Rudenet\RTL\Block;` statement defines the namespace of the block class.
The `class RTL extends Template` statement declares the class `RTL`, which extends the `Template` class. This means that the `RTL` class inherits properties and methods from the `Template` class, which is a part of Magento's framework for creating block classes.

### Use Statements:
`use` statements import external classes into the current namespace. In this case:
- `Magento\Framework\View\Element\Template`: This is the base class for block classes in Magento 2.
- `Magento\Framework\App\Config\ScopeConfigInterface`: This interface provides methods to read configuration settings.
- `Magento\Framework\View\Page\Config`: This class represents the page configuration, including assets like CSS and JavaScript.

### Constructor Method:
The `__construct()` method is a constructor for the block class. It initializes the class properties and injects dependencies.
It accepts several parameters:
- `$context`: An instance of `Template\Context`, which provides context information about the block.
- `$scopeConfig`: An instance of `ScopeConfigInterface`, which is used to read configuration settings.
- `$pageConfig`: An instance of `PageConfig`, which represents the page configuration.
- `$data`: An array of additional data passed to the block.
The parent constructor `parent::__construct($context, $data);` is called to initialize the parent class (`Template`) with the provided context and data.

### isEnabled Method:
The `isEnabled()` method checks whether the RTL flag is enabled in the configuration settings.
It uses the `getValue()` method of the `$scopeConfig` object to retrieve the value of the configuration setting `'general/locale_options/rtl_flag'`.
It casts the value to a boolean and returns it.

### addCustomCss Method:
The `addCustomCss()` method is responsible for adding the custom CSS file URL to the page configuration.
It uses the `getViewFileUrl()` method provided by the `Template` class to generate the URL of the CSS file `rtl.css` located in the `Rudenet_RTL` module.
It returns the generated CSS file URL.

Overall, this block class (`RTL`) is designed to determine whether RTL mode is enabled based on a configuration setting, and if enabled, it adds a custom CSS file (`rtl.css`) to the page configuration.


## system.xml

### Root `<config>` Element:
- The `<config>` element is the root element of the XML configuration.
- It defines configuration settings for Magento.

### System Configuration:
- The `<system>` element encapsulates system configuration settings.
- System configuration settings control various aspects of Magento's behavior and appearance.

### General Section:
- The `<section>` element defines a section of configuration settings.
- It has attributes like `id`, `translate`, `sortOrder`, `showInDefault`, `showInWebsite`, and `showInStore`.
  - `id`: Identifies the section.
  - `translate`: Specifies whether labels should be translated.
  - `sortOrder`: Determines the order in which sections are displayed.
  - `showInDefault`, `showInWebsite`, `showInStore`: Specify where the section should be displayed (default configuration, website configuration, store configuration).
- The `<label>` element provides a label for the section.
- The `<tab>` element specifies the tab where the section appears.
- The `<resource>` element defines the ACL resource associated with the section.

### Locale Options Group:
- The `<group>` element organizes configuration fields into logical groups.
- It has attributes similar to the section element.
- The `<label>` element provides a label for the group.
- The `<field>` element defines a configuration field within the group.
  - It has attributes like `id`, `translate`, `sortOrder`, `type`, `showInDefault`, `showInWebsite`, and `showInStore`.
  - `id`: Identifies the field.
  - `translate`: Specifies whether labels should be translated.
  - `sortOrder`: Determines the order in which fields are displayed.
  - `type`: Specifies the input type of the field (select, text, etc.).
  - `showInDefault`, `showInWebsite`, `showInStore`: Specify where the field should be displayed.
- The `<label>` element provides a label for the field.
- The `<source_model>` element specifies the model used to provide options for the field (in this case, Yes/No options).

### RTL Direction Field:
- The `RTL Direction` group contains a single field named `rtl_flag`.
- This field is a select type field allowing the user to enable or disable RTL direction.
- It is represented as a Yes/No dropdown in the admin configuration.
- The options for the field are provided by the `Magento\Config\Model\Config\Source\Yesno` model.
  
![Magento](https://raw.githubusercontent.com/proxytype/Magento2-RTL-Module/main/rtl-flag.PNG)
admin->stores->configuration

## moudle.xml

### Root `<config>` Element:
- The `<config>` element is the root element of the XML configuration.
- It encapsulates configuration settings for the Magento module.

### `xmlns:xsi` Attribute:
- The `xmlns:xsi` attribute defines the XML namespace for the XML Schema Instance (xsi).
- It specifies the location of the XML Schema Definition (XSD) used for validation.

### `xsi:noNamespaceSchemaLocation` Attribute:
- The `xsi:noNamespaceSchemaLocation` attribute specifies the location of the XSD schema file used for validation.
- In this case, it points to the module XSD schema file (`module.xsd`) within the Magento framework.

### Module Configuration:
- The `<module>` element defines configuration settings for the Magento module.
- It has attributes like `name` and `setup_version`.
  - `name`: Specifies the name of the module (in this case, "Rudenet_RTL").
  - `setup_version`: Specifies the version of the module setup script.

 
## default_head_blocks.xml

### Root `<page>` Element:
- The `<page>` element is the root element of the XML configuration.
- It encapsulates configuration settings for a specific Magento page layout.

### `xmlns:xsi` Attribute:
- The `xmlns:xsi` attribute defines the XML namespace for the XML Schema Instance (xsi).
- It specifies the location of the XML Schema Definition (XSD) used for validation.

### `xsi:noNamespaceSchemaLocation` Attribute:
- The `xsi:noNamespaceSchemaLocation` attribute specifies the location of the XSD schema file used for validation.
- In this case, it points to the page configuration XSD schema file (`page_configuration.xsd`) within the Magento framework.

### Page Configuration:
- The configuration inside the `<page>` element defines layout instructions for a specific page in Magento.

### `<body>` Element:
- The `<body>` element encapsulates layout instructions for the body of the page.
- It contains directives to include various blocks and containers within the page layout.

### `<referenceBlock>` Element:
- The `<referenceBlock>` element specifies a reference to an existing block within the layout.
- It allows you to modify or add content to the referenced block.

### `name` Attribute:
- The `name` attribute of the `<referenceBlock>` element specifies the name of the block being referenced.
- In this case, it refers to the block with the name "head.additional".

### `<block>` Element:
- The `<block>` element defines a new block to be added to the layout.
- It has attributes like `class`, `name`, and `template`.
  - `class`: Specifies the PHP class of the block.
  - `name`: Specifies a unique name for the block.
  - `template`: Specifies the template file to be used for rendering the block.

### `class` Attribute:
- The `class` attribute of the `<block>` element specifies the PHP class of the block.
- It indicates that the block should be instantiated from the `Rudenet\RTL\Block\RTL` class.

### `name` Attribute:
- The `name` attribute of the `<block>` element specifies a unique name for the block.
- It is used to reference the block within the layout XML.

### `template` Attribute:
- The `template` attribute of the `<block>` element specifies the template file to be used for rendering the block.
- In this case, it points to the template file `rtl_css.phtml` located in the `Rudenet_RTL` module.


## rtl_css.phtml

### `if` Statement:
- The `if` statement checks a condition to determine whether a block of code should be executed.
- In this case, `if ($block->isEnabled())` checks if the RTL functionality is enabled by calling the `isEnabled()` method of the `$block` object.
- If the condition evaluates to true, the code within the `if` block is executed.

### `endif;` Statement:
- The `endif;` statement marks the end of the `if` block.
- It closes the conditional block and indicates the end of the code that should be executed conditionally.

### CSS Inclusion:
- Inside the `if` block, a CSS file is included dynamically if the RTL functionality is enabled.
- The `<link>` element with the `rel="stylesheet"` attribute specifies a CSS file to be included.
- The `type="text/css"` attribute specifies the type of the linked resource as CSS.
- The `href` attribute contains the URL of the CSS file.
  - The URL is generated dynamically by calling the `addCustomCss()` method of the `$block` object.
  - This method retrieves the URL of the custom CSS file to be included based on the RTL configuration.
  - The PHP `echo` statement is used to output the URL within the HTML attribute value.

### PHP Short Syntax:
- `<?php ... ?>` and `<?php ... ?>` tags are used to enclose PHP code blocks.
- The PHP `echo` statement is used to output data to the HTML document.
- `<?= ... ?>` is a shorthand syntax for `<?php echo ...; ?>`, used here to output the URL dynamically within the HTML document.


## rtl.css
your own overwrite classes for direction and styling.

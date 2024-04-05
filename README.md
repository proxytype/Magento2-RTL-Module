```
Block
   |
   --> RTL.php
etc
   |
   --> adminhtml
	   |
	   --> system.xml
   |
   --> moudle.xml
view
   |
   --> frontend
           |
           --> layout
                  |
                  --> default_head_blocks.xml
           |
           --> templates
                  |
                  --> rtl_css.phtml
	   |
           --> web
                  |
                  --> css
                         |
                         --> rtl.css
```

## RTL.php

Namespace and Class Declaration:

The namespace Rudenet\RTL\Block; statement defines the namespace of the block class.
The class RTL extends Template statement declares the class RTL, which extends the Template class. This means that the RTL class inherits properties and methods from the Template class, which is a part of Magento's framework for creating block classes.
Use Statements:

use statements import external classes into the current namespace. In this case:
Magento\Framework\View\Element\Template: This is the base class for block classes in Magento 2.
Magento\Framework\App\Config\ScopeConfigInterface: This interface provides methods to read configuration settings.
Magento\Framework\View\Page\Config: This class represents the page configuration, including assets like CSS and JavaScript.
Constructor Method:

The __construct() method is a constructor for the block class. It initializes the class properties and injects dependencies.
It accepts several parameters:
$context: An instance of Template\Context, which provides context information about the block.
$scopeConfig: An instance of ScopeConfigInterface, which is used to read configuration settings.
$pageConfig: An instance of PageConfig, which represents the page configuration.
$data: An array of additional data passed to the block.
The parent constructor parent::__construct($context, $data); is called to initialize the parent class (Template) with the provided context and data.
isEnabled Method:

The isEnabled() method checks whether the RTL flag is enabled in the configuration settings.
It uses the getValue() method of the $scopeConfig object to retrieve the value of the configuration setting 'general/locale_options/rtl_flag'.
It casts the value to a boolean and returns it.
addCustomCss Method:

The addCustomCss() method is responsible for adding the custom CSS file URL to the page configuration.
It uses the getViewFileUrl() method provided by the Template class to generate the URL of the CSS file rtl.css located in the Rudenet_RTL module.
It returns the generated CSS file URL.
Overall, this block class (RTL) is designed to determine whether RTL mode is enabled based on a configuration setting, and if enabled, it adds a custom CSS file (rtl.css) to the page configuration.

## system.xml
## moudle.xml
## default_head_blocks.xml
## rtl_css.phtml
## rtl.css

<?php
return array (
  'lib' => 
  array (
    'files' => 
    array (
      'AjaxActionElement' => 
      array (
        'file' => 'lib/Ajax/AjaxActionElement.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'AjaxElement',
        ),
      ),
      'AjaxAppendElement' => 
      array (
        'file' => 'lib/Ajax/AjaxAppendElement.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'AjaxHtmlElement',
        ),
      ),
      'AjaxElement' => 
      array (
        'file' => 'lib/Ajax/AjaxElement.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'HtmlElement',
        ),
      ),
      'AjaxError' => 
      array (
        'file' => 'lib/Ajax/AjaxError.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'Error',
        ),
      ),
      'AjaxErrorElement' => 
      array (
        'file' => 'lib/Ajax/AjaxErrorElement.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'AjaxElement',
        ),
      ),
      'AjaxHtmlElement' => 
      array (
        'file' => 'lib/Ajax/AjaxHtmlElement.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'AjaxElement',
        ),
      ),
      'AjaxJSON' => 
      array (
        'file' => 'lib/Ajax/AjaxJSON.php',
        'uses' => NULL,
        'extends' => NULL,
      ),
      'AjaxMessageElement' => 
      array (
        'file' => 'lib/Ajax/AjaxMessageElement.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'AjaxElement',
        ),
      ),
      'AjaxRemoveElement' => 
      array (
        'file' => 'lib/Ajax/AjaxRemoveElement.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'AjaxHtmlElement',
        ),
      ),
      'AjaxReplaceElement' => 
      array (
        'file' => 'lib/Ajax/AjaxReplaceElement.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'AjaxHtmlElement',
        ),
      ),
      'AjaxResponse' => 
      array (
        'file' => 'lib/Ajax/AjaxResponse.php',
        'uses' => 
        array (
          0 => 'Configuration',
          1 => 'Language',
          2 => 'HtmlElement',
        ),
        'extends' => NULL,
      ),
      'AjaxRootElement' => 
      array (
        'file' => 'lib/Ajax/AjaxRootElement.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'AjaxElement',
        ),
      ),
      'AjaxSelectElement' => 
      array (
        'file' => 'lib/Ajax/AjaxSelectElement.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'AjaxHtmlElement',
        ),
      ),
      'AjaxSuccessElement' => 
      array (
        'file' => 'lib/Ajax/AjaxSuccessElement.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'AjaxElement',
        ),
      ),
      'Application' => 
      array (
        'file' => 'lib/Application/Application.php',
        'uses' => 
        array (
          0 => 'Enviroment',
          1 => 'IO',
          2 => 'Lang',
          3 => 'LocalConfiguration',
        ),
        'extends' => 
        array (
          0 => 'EventDispatcher',
        ),
      ),
      'ApplicationError' => 
      array (
        'file' => 'lib/Application/ApplicationError.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'Error',
        ),
      ),
      'SharedApplication' => 
      array (
        'file' => 'lib/Application/SharedApplication.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'Application',
        ),
      ),
      'SystemApplication' => 
      array (
        'file' => 'lib/Application/SystemApplication.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'Application',
        ),
      ),
      'ArrayList' => 
      array (
        'file' => 'lib/Collection/ArrayList.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'ArrayListIteratorAggregate',
          1 => 'ArrayAccess',
        ),
      ),
      'ArrayListIterator' => 
      array (
        'file' => 'lib/Collection/ArrayListIterator.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'Iterator',
        ),
      ),
      'ArrayListIteratorAggregate' => 
      array (
        'file' => 'lib/Collection/ArrayListIteratorAggregate.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'IteratorAggregate',
        ),
      ),
      'CollectionError' => 
      array (
        'file' => 'lib/Collection/CollectionError.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'Error',
        ),
      ),
      'Configuration' => 
      array (
        'file' => 'lib/Configuration/Configuration.php',
        'uses' => 
        array (
          0 => 'Core',
          1 => 'IO',
          2 => 'Lang',
        ),
        'extends' => NULL,
      ),
      'ConfigurationCache' => 
      array (
        'file' => 'lib/Configuration/ConfigurationCache.php',
        'uses' => 
        array (
          0 => 'Cache',
        ),
        'extends' => 
        array (
          0 => 'Cacheable',
        ),
      ),
      'GlobalConfiguration' => 
      array (
        'file' => 'lib/Configuration/GlobalConfiguration.php',
        'uses' => 
        array (
          0 => 'Core',
          1 => 'IO',
          2 => 'Lang',
        ),
        'extends' => 
        array (
          0 => 'Configuration',
        ),
      ),
      'LocalConfiguration' => 
      array (
        'file' => 'lib/Configuration/LocalConfiguration.php',
        'uses' => 
        array (
          0 => 'Core',
          1 => 'IO',
          2 => 'Lang',
        ),
        'extends' => 
        array (
          0 => 'Configuration',
        ),
      ),
      'ControllerError' => 
      array (
        'file' => 'lib/Controller/ControllerError.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'Error',
        ),
      ),
      'DefaultController' => 
      array (
        'file' => 'lib/Controller/DefaultController.php',
        'uses' => 
        array (
          0 => 'Load',
          1 => 'Enviroment',
          2 => 'Lang',
          3 => 'View',
          4 => 'CurrentHttpRequest',
          5 => 'CurrentHttpResponse',
          6 => 'Application',
          7 => 'Html',
          8 => 'Text',
          9 => 'Error',
        ),
        'extends' => 
        array (
          0 => 'EventDispatcher',
        ),
      ),
      'DefaultSessionController' => 
      array (
        'file' => 'lib/Controller/DefaultSessionController.php',
        'uses' => 
        array (
          0 => 'Lang',
          1 => 'Session',
        ),
        'extends' => NULL,
      ),
      'autoLoad' => 
      array (
        'file' => 'lib/Core/autoLoad.php',
        'uses' => 
        array (
          0 => 'Load',
        ),
        'extends' => NULL,
      ),
      'Browser' => 
      array (
        'file' => 'lib/Core/Browser.php',
        'uses' => NULL,
        'extends' => NULL,
      ),
      'Buffer' => 
      array (
        'file' => 'lib/Core/Buffer.php',
        'uses' => NULL,
        'extends' => NULL,
      ),
      'Caller' => 
      array (
        'file' => 'lib/Core/Caller.php',
        'uses' => NULL,
        'extends' => NULL,
      ),
      'Compressor' => 
      array (
        'file' => 'lib/Core/Compressor.php',
        'uses' => NULL,
        'extends' => NULL,
      ),
      'Enviroment' => 
      array (
        'file' => 'lib/Core/Enviroment.php',
        'uses' => 
        array (
          0 => 'Configuration',
          1 => 'Http',
          2 => 'Application',
          3 => 'Text',
        ),
        'extends' => NULL,
      ),
      'Injection' => 
      array (
        'file' => 'lib/Core/Injection.php',
        'uses' => NULL,
        'extends' => NULL,
      ),
      'Load' => 
      array (
        'file' => 'lib/Core/Load.php',
        'uses' => 
        array (
          0 => 'Enviroment',
        ),
        'extends' => NULL,
      ),
      'Log' => 
      array (
        'file' => 'lib/Core/Log.php',
        'uses' => 
        array (
          0 => 'Configuration',
          1 => 'Lang',
          2 => 'IO',
          3 => 'Application',
          4 => 'Error',
        ),
        'extends' => NULL,
      ),
      'Object' => 
      array (
        'file' => 'lib/Core/Object.php',
        'uses' => NULL,
        'extends' => NULL,
      ),
      'Serial' => 
      array (
        'file' => 'lib/Core/Serial.php',
        'uses' => NULL,
        'extends' => NULL,
      ),
      'Xml' => 
      array (
        'file' => 'lib/Core/Xml.php',
        'uses' => 
        array (
          0 => 'Core',
          1 => 'Lang',
        ),
        'extends' => 
        array (
          0 => 'DOMDocument',
        ),
      ),
      'Date' => 
      array (
        'file' => 'lib/DateTime/Date.php',
        'uses' => 
        array (
          0 => 'Core',
          1 => 'DateTime',
          2 => 'Lang',
        ),
        'extends' => 
        array (
          0 => 'Object',
        ),
      ),
      'DateTimeError' => 
      array (
        'file' => 'lib/DateTime/DateTimeError.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'Error',
        ),
      ),
      'TimeSpan' => 
      array (
        'file' => 'lib/DateTime/TimeSpan.php',
        'uses' => 
        array (
          0 => 'Core',
          1 => 'DateTime',
        ),
        'extends' => 
        array (
          0 => 'Object',
        ),
      ),
      'DebugError' => 
      array (
        'file' => 'lib/Debug/DebugError.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'Error',
        ),
      ),
      'Profiler' => 
      array (
        'file' => 'lib/Debug/Profiler.php',
        'uses' => 
        array (
          0 => 'DateTime',
          1 => 'Core',
        ),
        'extends' => 
        array (
          0 => 'Object',
        ),
      ),
      'Image' => 
      array (
        'file' => 'lib/Drawing/Image.php',
        'uses' => 
        array (
          0 => 'Core',
          1 => 'Lang',
        ),
        'extends' => NULL,
      ),
      'ImageError' => 
      array (
        'file' => 'lib/Drawing/ImageError.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'Error',
        ),
      ),
      'ImageInfo' => 
      array (
        'file' => 'lib/Drawing/ImageInfo.php',
        'uses' => 
        array (
          0 => 'Format',
        ),
        'extends' => NULL,
      ),
      'Thumb' => 
      array (
        'file' => 'lib/Drawing/Thumb.php',
        'uses' => 
        array (
          0 => 'IO',
          1 => 'Lang',
          2 => 'Enviroment',
        ),
        'extends' => 
        array (
          0 => 'Image',
        ),
      ),
      'WaterMark' => 
      array (
        'file' => 'lib/Drawing/WaterMark.php',
        'uses' => 
        array (
          0 => 'IO',
          1 => 'Lang',
          2 => 'Enviroment',
        ),
        'extends' => 
        array (
          0 => 'Image',
        ),
      ),
      'EmailError' => 
      array (
        'file' => 'lib/Email/EmailError.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'Error',
        ),
      ),
      'Mail' => 
      array (
        'file' => 'lib/Email/Mail.php',
        'uses' => 
        array (
          0 => 'Core',
          1 => 'IO',
          2 => 'Lang',
          3 => 'Email',
        ),
        'extends' => NULL,
      ),
      'SmtpConnection' => 
      array (
        'file' => 'lib/Email/SmtpConnection.php',
        'uses' => 
        array (
          0 => 'Core',
          1 => 'Lang',
          2 => 'Socket',
        ),
        'extends' => 
        array (
          0 => 'SocketConnection',
        ),
      ),
      'SmtpServer' => 
      array (
        'file' => 'lib/Email/SmtpServer.php',
        'uses' => 
        array (
          0 => 'Core',
          1 => 'Lang',
          2 => 'Socket',
          3 => 'Text',
        ),
        'extends' => 
        array (
          0 => 'Object',
        ),
      ),
      'Error' => 
      array (
        'file' => 'lib/Error/Error.php',
        'uses' => 
        array (
          0 => 'Lang',
          1 => 'Enviroment',
          2 => 'Load',
          3 => 'Serial',
          4 => 'Application',
          5 => 'Configuration',
          6 => 'Log',
          7 => 'Report',
          8 => 'CurrentHttpRequest',
        ),
        'extends' => 
        array (
          0 => 'Exception',
        ),
      ),
      'Report' => 
      array (
        'file' => 'lib/Error/Report.php',
        'uses' => 
        array (
          0 => 'Enviroment',
          1 => 'Log',
          2 => 'Text',
          3 => 'Configuration',
          4 => 'Application',
          5 => 'Lang',
          6 => 'Email',
        ),
        'extends' => NULL,
      ),
      'EventDispatcher' => 
      array (
        'file' => 'lib/Event/EventDispatcher.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'Object',
        ),
      ),
      'EventError' => 
      array (
        'file' => 'lib/Event/EventError.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'Error',
        ),
      ),
      'FormatError' => 
      array (
        'file' => 'lib/Format/FormatError.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'Error',
        ),
      ),
      'Formatter' => 
      array (
        'file' => 'lib/Format/Formatter.php',
        'uses' => 
        array (
          0 => 'Lang',
        ),
        'extends' => 
        array (
          0 => 'Object',
        ),
      ),
      'HtmlDocument' => 
      array (
        'file' => 'lib/Html/HtmlDocument.php',
        'uses' => 
        array (
          0 => 'HtmlElement',
          1 => 'Lang',
          2 => 'LocalConfiguration',
          3 => 'HtmlTranslator',
        ),
        'extends' => 
        array (
          0 => 'DOMDocument',
        ),
      ),
      'HtmlElementList' => 
      array (
        'file' => 'lib/Html/HtmlElementList.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'ArrayListIteratorAggregate',
        ),
      ),
      'HtmlError' => 
      array (
        'file' => 'lib/Html/HtmlError.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'Error',
        ),
      ),
      'HtmlParser' => 
      array (
        'file' => 'lib/Html/HtmlParser.php',
        'uses' => 
        array (
          0 => 'Text',
          1 => 'LocalConfiguration',
          2 => 'DataManager',
          3 => 'Enviroment',
          4 => 'Controller',
          5 => 'View',
        ),
        'extends' => NULL,
      ),
      'HtmlPersistentDocument' => 
      array (
        'file' => 'lib/Html/HtmlPersistentDocument.php',
        'uses' => NULL,
        'extends' => NULL,
      ),
      'HtmlText' => 
      array (
        'file' => 'lib/Html/HtmlText.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'DOMText',
        ),
      ),
      'HtmlTranslator' => 
      array (
        'file' => 'lib/Html/HtmlTranslator.php',
        'uses' => 
        array (
          0 => 'Text',
        ),
        'extends' => NULL,
      ),
      'ErrorSummaryComponent' => 
      array (
        'file' => 'lib/Html/Component/ErrorSummaryComponent.php',
        'uses' => 
        array (
          0 => 'Lang',
          1 => 'Error',
          2 => 'InputField',
        ),
        'extends' => 
        array (
          0 => 'HtmlComponent',
        ),
      ),
      'FormComponent' => 
      array (
        'file' => 'lib/Html/Component/FormComponent.php',
        'uses' => 
        array (
          0 => 'Text',
          1 => 'Validator',
          2 => 'Html',
          3 => 'Serial',
          4 => 'Lang',
          5 => 'Enviroment',
        ),
        'extends' => 
        array (
          0 => 'HtmlComponent',
        ),
      ),
      'HtmlComponent' => 
      array (
        'file' => 'lib/Html/Component/HtmlComponent.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'HtmlElement',
        ),
      ),
      'INavigationComponent' => 
      array (
        'file' => 'lib/Html/Component/INavigationComponent.php',
        'uses' => NULL,
        'extends' => NULL,
      ),
      'MenuComponent' => 
      array (
        'file' => 'lib/Html/Component/MenuComponent.php',
        'uses' => 
        array (
          0 => 'Enviroment',
          1 => 'Xml',
          2 => 'Language',
          3 => 'Error',
          4 => 'Strings',
          5 => 'Configuration',
          6 => 'IO',
        ),
        'extends' => 
        array (
          0 => 'HtmlComponent',
          1 => 'INavigationComponent',
        ),
      ),
      'MessageComponent' => 
      array (
        'file' => 'lib/Html/Component/MessageComponent.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'HtmlComponent',
        ),
      ),
      'SiteNavigationComponent' => 
      array (
        'file' => 'lib/Html/Component/SiteNavigationComponent.php',
        'uses' => 
        array (
          0 => 'Lang',
          1 => 'Core',
          2 => 'ArrayList',
          3 => 'Strings',
        ),
        'extends' => 
        array (
          0 => 'HtmlComponent',
          1 => 'INavigationComponent',
        ),
      ),
      'TablePaginateComponent' => 
      array (
        'file' => 'lib/Html/Component/TablePaginateComponent.php',
        'uses' => 
        array (
          0 => 'Propel',
          1 => 'Format',
          2 => 'Language',
        ),
        'extends' => 
        array (
          0 => 'HtmlTable',
        ),
      ),
      'HtmlButton' => 
      array (
        'file' => 'lib/Html/Element/HtmlButton.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'HtmlElement',
        ),
      ),
      'HtmlElement' => 
      array (
        'file' => 'lib/Html/Element/HtmlElement.php',
        'uses' => 
        array (
          0 => 'HtmlDocument',
          1 => 'HtmlTranslator',
          2 => 'Text',
          3 => 'Enviroment',
          4 => 'Object',
          5 => 'Lang',
          6 => 'LocalConfiguration',
          7 => 'HtmlTranslator',
        ),
        'extends' => 
        array (
          0 => 'HtmlEvent',
        ),
      ),
      'HtmlEvent' => 
      array (
        'file' => 'lib/Html/Element/HtmlEvent.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'HtmlState',
        ),
      ),
      'HtmlIframe' => 
      array (
        'file' => 'lib/Html/Element/HtmlIframe.php',
        'uses' => 
        array (
          0 => 'Html',
          1 => 'Enviroment',
        ),
        'extends' => 
        array (
          0 => 'HtmlElement',
        ),
      ),
      'HtmlImage' => 
      array (
        'file' => 'lib/Html/Element/HtmlImage.php',
        'uses' => 
        array (
          0 => 'Html',
          1 => 'Enviroment',
        ),
        'extends' => 
        array (
          0 => 'HtmlElement',
        ),
      ),
      'HtmlInput' => 
      array (
        'file' => 'lib/Html/Element/HtmlInput.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'HtmlElement',
          1 => 'IHtmlFormElement',
        ),
      ),
      'HtmlLabel' => 
      array (
        'file' => 'lib/Html/Element/HtmlLabel.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'HtmlElement',
        ),
      ),
      'HtmlLink' => 
      array (
        'file' => 'lib/Html/Element/HtmlLink.php',
        'uses' => 
        array (
          0 => 'Html',
          1 => 'Enviroment',
        ),
        'extends' => 
        array (
          0 => 'HtmlElement',
        ),
      ),
      'HtmlState' => 
      array (
        'file' => 'lib/Html/Element/HtmlState.php',
        'uses' => 
        array (
          0 => 'HtmlDocument',
          1 => 'LocalConfiguration',
          2 => 'Session',
          3 => 'CurrentHttpRequest',
        ),
        'extends' => 
        array (
          0 => 'DOMElement',
        ),
      ),
      'HtmlTable' => 
      array (
        'file' => 'lib/Html/Element/HtmlTable.php',
        'uses' => 
        array (
          0 => 'Format',
          1 => 'Strings',
        ),
        'extends' => 
        array (
          0 => 'HtmlElement',
        ),
      ),
      'HtmlSelect' => 
      array (
        'file' => 'lib/Html/Element/Form/HtmlSelect.php',
        'uses' => 
        array (
          0 => 'Html',
          1 => 'Lang',
          2 => 'CamelCase',
          3 => 'ArrayList',
        ),
        'extends' => 
        array (
          0 => 'HtmlElement',
          1 => 'IHtmlFormElement',
        ),
      ),
      'IHtmlFormElement' => 
      array (
        'file' => 'lib/Html/Element/Form/IHtmlFormElement.php',
        'uses' => NULL,
        'extends' => NULL,
      ),
      'InputCheckbox' => 
      array (
        'file' => 'lib/Html/Element/Form/InputCheckbox.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'HtmlInput',
        ),
      ),
      'InputHidden' => 
      array (
        'file' => 'lib/Html/Element/Form/InputHidden.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'HtmlInput',
        ),
      ),
      'InputPassword' => 
      array (
        'file' => 'lib/Html/Element/Form/InputPassword.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'HtmlInput',
        ),
      ),
      'InputRadio' => 
      array (
        'file' => 'lib/Html/Element/Form/InputRadio.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'HtmlInput',
        ),
      ),
      'InputText' => 
      array (
        'file' => 'lib/Html/Element/Form/InputText.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'HtmlInput',
        ),
      ),
      'InputTextarea' => 
      array (
        'file' => 'lib/Html/Element/Form/InputTextarea.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'HtmlElement',
          1 => 'IHtmlFormElement',
        ),
      ),
      'CurrentHttpRequest' => 
      array (
        'file' => 'lib/Http/CurrentHttpRequest.php',
        'uses' => 
        array (
          0 => 'Core',
          1 => 'Strings',
          2 => 'Collection',
          3 => 'Lang',
        ),
        'extends' => 
        array (
          0 => 'HttpTransport',
        ),
      ),
      'CurrentHttpResponse' => 
      array (
        'file' => 'lib/Http/CurrentHttpResponse.php',
        'uses' => 
        array (
          0 => 'Core',
        ),
        'extends' => 
        array (
          0 => 'HttpTransport',
        ),
      ),
      'HttpError' => 
      array (
        'file' => 'lib/Http/HttpError.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'Error',
        ),
      ),
      'HttpProxyAuthentication' => 
      array (
        'file' => 'lib/Http/HttpProxyAuthentication.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'Object',
        ),
      ),
      'HttpRequest' => 
      array (
        'file' => 'lib/Http/HttpRequest.php',
        'uses' => 
        array (
          0 => 'Core',
          1 => 'Socket',
          2 => 'Lang',
        ),
        'extends' => 
        array (
          0 => 'HttpTransport',
        ),
      ),
      'HttpResponse' => 
      array (
        'file' => 'lib/Http/HttpResponse.php',
        'uses' => 
        array (
          0 => 'Core',
        ),
        'extends' => 
        array (
          0 => 'HttpTransport',
        ),
      ),
      'HttpTransport' => 
      array (
        'file' => 'lib/Http/HttpTransport.php',
        'uses' => 
        array (
          0 => 'Core',
          1 => 'Lang',
        ),
        'extends' => 
        array (
          0 => 'Object',
        ),
      ),
      'Cookie' => 
      array (
        'file' => 'lib/Http/Cookies/Cookie.php',
        'uses' => 
        array (
          0 => 'Strings',
          1 => 'IO',
          2 => 'Enviroment',
          3 => 'Language',
          4 => 'DateTime',
          5 => 'Application',
        ),
        'extends' => NULL,
      ),
      'CookieError' => 
      array (
        'file' => 'lib/Http/Cookies/CookieError.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'Error',
        ),
      ),
      'CookiesList' => 
      array (
        'file' => 'lib/Http/Cookies/CookiesList.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'ArrayList',
        ),
      ),
      'CookiesManager' => 
      array (
        'file' => 'lib/Http/Cookies/CookiesManager.php',
        'uses' => NULL,
        'extends' => NULL,
      ),
      'Dir' => 
      array (
        'file' => 'lib/IO/Dir.php',
        'uses' => 
        array (
          0 => 'Lang',
        ),
        'extends' => NULL,
      ),
      'DirPath' => 
      array (
        'file' => 'lib/IO/DirPath.php',
        'uses' => 
        array (
          0 => 'Core',
          1 => 'Lang',
        ),
        'extends' => 
        array (
          0 => 'Path',
        ),
      ),
      'DirsListIterator' => 
      array (
        'file' => 'lib/IO/DirsListIterator.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'ArrayListIteratorAggregate',
        ),
      ),
      'File' => 
      array (
        'file' => 'lib/IO/File.php',
        'uses' => 
        array (
          0 => 'Core',
          1 => 'Lang',
        ),
        'extends' => 
        array (
          0 => 'Object',
        ),
      ),
      'FilePath' => 
      array (
        'file' => 'lib/IO/FilePath.php',
        'uses' => 
        array (
          0 => 'Core',
          1 => 'Lang',
        ),
        'extends' => 
        array (
          0 => 'Path',
        ),
      ),
      'FilesListIterator' => 
      array (
        'file' => 'lib/IO/FilesListIterator.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'ArrayListIteratorAggregate',
        ),
      ),
      'IOError' => 
      array (
        'file' => 'lib/IO/IOError.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'Error',
        ),
      ),
      'Path' => 
      array (
        'file' => 'lib/IO/Path.php',
        'uses' => 
        array (
          0 => 'Core',
          1 => 'Lang',
        ),
        'extends' => NULL,
      ),
      'Language' => 
      array (
        'file' => 'lib/Lang/Language.php',
        'uses' => 
        array (
          0 => 'IO',
          1 => 'Core',
          2 => 'Cache',
          3 => 'Text',
        ),
        'extends' => 
        array (
          0 => 'Cacheable',
        ),
      ),
      'CssMin' => 
      array (
        'file' => 'lib/Minify/CssMin/CssMin.php',
        'uses' => NULL,
        'extends' => NULL,
      ),
      'CssMinFunctions' => 
      array (
        'file' => 'lib/Minify/CssMin/CssMinFunctions.php',
        'uses' => NULL,
        'extends' => NULL,
      ),
      'JSMin' => 
      array (
        'file' => 'lib/Minify/JSMin/JSMin.php',
        'uses' => NULL,
        'extends' => NULL,
      ),
      'JSMinException' => 
      array (
        'file' => 'lib/Minify/JSMin/JSMinException.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'Exception',
        ),
      ),
      'CustomMySqlSchemaParser' => 
      array (
        'file' => 'lib/ORM/Propel/CustomMySqlSchemaParser.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'MysqlSchemaParser',
        ),
      ),
      'DefaultResourceController' => 
      array (
        'file' => 'lib/Resource/DefaultResourceController.php',
        'uses' => 
        array (
          0 => 'Core',
          1 => 'Lang',
          2 => 'IO',
          3 => 'Http',
          4 => 'Minify',
          5 => 'DateTime',
        ),
        'extends' => 
        array (
          0 => 'Object',
        ),
      ),
      'ResourceError' => 
      array (
        'file' => 'lib/Resource/ResourceError.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'Error',
        ),
      ),
      'ResourceFile' => 
      array (
        'file' => 'lib/Resource/ResourceFile.php',
        'uses' => 
        array (
          0 => 'Core',
          1 => 'Strings',
          2 => 'Collection',
        ),
        'extends' => 
        array (
          0 => 'Object',
        ),
      ),
      'ResourceLoader' => 
      array (
        'file' => 'lib/Resource/ResourceLoader.php',
        'uses' => 
        array (
          0 => 'Core',
          1 => 'Collection',
          2 => 'Minify',
          3 => 'Lang',
          4 => 'DateTime',
        ),
        'extends' => 
        array (
          0 => 'Object',
        ),
      ),
      'Router' => 
      array (
        'file' => 'lib/Router/Router.php',
        'uses' => 
        array (
          0 => 'Enviroment',
          1 => 'Lang',
          2 => 'Strings',
          3 => 'Configuration',
          4 => 'Cache',
        ),
        'extends' => NULL,
      ),
      'RouterError' => 
      array (
        'file' => 'lib/Router/RouterError.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'Error',
        ),
      ),
      'Session' => 
      array (
        'file' => 'lib/Session/Session.php',
        'uses' => 
        array (
          0 => 'Enviroment',
          1 => 'Serial',
          2 => 'Configuration',
          3 => 'Event',
          4 => 'Application',
          5 => 'ArrayList',
          6 => 'Text',
        ),
        'extends' => NULL,
      ),
      'SessionCache' => 
      array (
        'file' => 'lib/Session/SessionCache.php',
        'uses' => 
        array (
          0 => 'Cache',
        ),
        'extends' => 
        array (
          0 => 'Cacheable',
        ),
      ),
      'SocketConnection' => 
      array (
        'file' => 'lib/Socket/SocketConnection.php',
        'uses' => 
        array (
          0 => 'Core',
          1 => 'Lang',
        ),
        'extends' => 
        array (
          0 => 'Object',
        ),
      ),
      'SocketError' => 
      array (
        'file' => 'lib/Socket/SocketError.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'Error',
        ),
      ),
      'Cache' => 
      array (
        'file' => 'lib/Storage/Cache/Cache.php',
        'uses' => 
        array (
          0 => 'Core',
          1 => 'IO',
          2 => 'Lang',
        ),
        'extends' => NULL,
      ),
      'Cacheable' => 
      array (
        'file' => 'lib/Storage/Cache/Cacheable.php',
        'uses' => 
        array (
          0 => 'File',
          1 => 'LocalConfiguration',
          2 => 'Language',
          3 => 'Enviroment',
          4 => 'Report',
        ),
        'extends' => NULL,
      ),
      'CacheError' => 
      array (
        'file' => 'lib/Storage/Cache/CacheError.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'Error',
        ),
      ),
      'CacheManager' => 
      array (
        'file' => 'lib/Storage/Cache/CacheManager.php',
        'uses' => NULL,
        'extends' => NULL,
      ),
      'DataError' => 
      array (
        'file' => 'lib/Storage/DataManager/DataError.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'Error',
        ),
      ),
      'DataManager' => 
      array (
        'file' => 'lib/Storage/DataManager/DataManager.php',
        'uses' => 
        array (
          0 => 'HtmlElement',
        ),
        'extends' => NULL,
      ),
      'CamelCase' => 
      array (
        'file' => 'lib/Strings/CamelCase.php',
        'uses' => NULL,
        'extends' => NULL,
      ),
      'Text' => 
      array (
        'file' => 'lib/Strings/Text.php',
        'uses' => 
        array (
          0 => 'Core',
          1 => 'ArrayList',
        ),
        'extends' => NULL,
      ),
      'SystemAccessConfiguration' => 
      array (
        'file' => 'lib/SystemAccess/SystemAccessConfiguration.php',
        'uses' => 
        array (
          0 => 'Collection',
          1 => 'Cache',
          2 => 'Text',
        ),
        'extends' => 
        array (
          0 => 'Cacheable',
        ),
      ),
      'SystemAccessError' => 
      array (
        'file' => 'lib/SystemAccess/SystemAccessError.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'Error',
        ),
      ),
      'SystemAccessLogin' => 
      array (
        'file' => 'lib/SystemAccess/SystemAccessLogin.php',
        'uses' => 
        array (
          0 => 'Collection',
          1 => 'Session',
          2 => 'Strings',
          3 => 'Cookies',
        ),
        'extends' => NULL,
      ),
      'SystemAccessManager' => 
      array (
        'file' => 'lib/SystemAccess/SystemAccessManager.php',
        'uses' => 
        array (
          0 => 'IO',
          1 => 'Core',
          2 => 'Lang',
          3 => 'Session',
          4 => 'Text',
        ),
        'extends' => NULL,
      ),
      'SystemAccessPermission' => 
      array (
        'file' => 'lib/SystemAccess/SystemAccessPermission.php',
        'uses' => 
        array (
          0 => 'Text',
        ),
        'extends' => NULL,
      ),
      'SystemAccessPersistence' => 
      array (
        'file' => 'lib/SystemAccess/SystemAccessPersistence.php',
        'uses' => NULL,
        'extends' => NULL,
      ),
      'SystemAccessRole' => 
      array (
        'file' => 'lib/SystemAccess/SystemAccessRole.php',
        'uses' => 
        array (
          0 => 'Text',
        ),
        'extends' => NULL,
      ),
      'SystemAccessValidationType' => 
      array (
        'file' => 'lib/SystemAccess/SystemAccessValidationType.php',
        'uses' => NULL,
        'extends' => NULL,
      ),
      'Thread' => 
      array (
        'file' => 'lib/Threading/Thread.php',
        'uses' => 
        array (
          0 => 'Threading',
          1 => 'Lang',
          2 => 'Enviroment',
          3 => 'Log',
          4 => 'Load',
          5 => 'Configuration',
          6 => 'IO',
        ),
        'extends' => NULL,
      ),
      'ThreadError' => 
      array (
        'file' => 'lib/Threading/ThreadError.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'Error',
        ),
      ),
      'ThreadWorker' => 
      array (
        'file' => 'lib/Threading/ThreadWorker.php',
        'uses' => 
        array (
          0 => 'Threading',
          1 => 'TimeSpan',
          2 => 'Lang',
          3 => 'Object',
          4 => 'LocalConfiguration',
          5 => 'Log',
          6 => 'Enviroment',
        ),
        'extends' => 
        array (
          0 => 'EventDispatcher',
        ),
      ),
      'ThreadWorkerPool' => 
      array (
        'file' => 'lib/Threading/ThreadWorkerPool.php',
        'uses' => 
        array (
          0 => 'Threading',
          1 => 'Load',
          2 => 'IO',
          3 => 'Lang',
          4 => 'Enviroment',
        ),
        'extends' => NULL,
      ),
      'FileUpload' => 
      array (
        'file' => 'lib/Upload/FileUpload.php',
        'uses' => 
        array (
          0 => 'Strings',
          1 => 'IO',
        ),
        'extends' => NULL,
      ),
      'UploadError' => 
      array (
        'file' => 'lib/Upload/UploadError.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'Error',
        ),
      ),
      'UploadManager' => 
      array (
        'file' => 'lib/Upload/UploadManager.php',
        'uses' => 
        array (
          0 => 'Lang',
          1 => 'IO',
        ),
        'extends' => 
        array (
          0 => 'Object',
        ),
      ),
      'ErrorsList' => 
      array (
        'file' => 'lib/Validation/ErrorsList.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'InputsList',
        ),
      ),
      'InputField' => 
      array (
        'file' => 'lib/Validation/InputField.php',
        'uses' => NULL,
        'extends' => NULL,
      ),
      'InputRule' => 
      array (
        'file' => 'lib/Validation/InputRule.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'Object',
        ),
      ),
      'InputsList' => 
      array (
        'file' => 'lib/Validation/InputsList.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'ArrayList',
        ),
      ),
      'Rule' => 
      array (
        'file' => 'lib/Validation/Rule.php',
        'uses' => NULL,
        'extends' => NULL,
      ),
      'ValidationError' => 
      array (
        'file' => 'lib/Validation/ValidationError.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'Error',
        ),
      ),
      'ValidationResult' => 
      array (
        'file' => 'lib/Validation/ValidationResult.php',
        'uses' => 
        array (
          0 => 'Collection',
        ),
        'extends' => NULL,
      ),
      'Validator' => 
      array (
        'file' => 'lib/Validation/Validator.php',
        'uses' => 
        array (
          0 => 'Xml',
          1 => 'Lang',
          2 => 'IO',
          3 => 'Http',
          4 => 'Collection',
          5 => 'Enviroment',
        ),
        'extends' => 
        array (
          0 => 'Object',
        ),
      ),
      'DefaultView' => 
      array (
        'file' => 'lib/View/DefaultView.php',
        'uses' => 
        array (
          0 => 'ArrayList',
          1 => 'LocalConfiguration',
          2 => 'Enviroment',
          3 => 'Browser',
          4 => 'Text',
          5 => 'Lang',
          6 => 'File',
          7 => 'Resource',
          8 => 'Html',
          9 => 'CurrentHttpResponse',
        ),
        'extends' => 
        array (
          0 => 'EventDispatcher',
        ),
      ),
      'ViewError' => 
      array (
        'file' => 'lib/View/ViewError.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'Error',
        ),
      ),
    ),
    'packages' => 
    array (
      'Ajax' => 
      array (
        'files' => 
        array (
          0 => 'AjaxActionElement',
          1 => 'AjaxAppendElement',
          2 => 'AjaxElement',
          3 => 'AjaxError',
          4 => 'AjaxErrorElement',
          5 => 'AjaxHtmlElement',
          6 => 'AjaxJSON',
          7 => 'AjaxMessageElement',
          8 => 'AjaxRemoveElement',
          9 => 'AjaxReplaceElement',
          10 => 'AjaxResponse',
          11 => 'AjaxRootElement',
          12 => 'AjaxSelectElement',
          13 => 'AjaxSuccessElement',
        ),
      ),
      'Application' => 
      array (
        'files' => 
        array (
          0 => 'Application',
          1 => 'ApplicationError',
          2 => 'SharedApplication',
          3 => 'SystemApplication',
        ),
      ),
      'Collection' => 
      array (
        'files' => 
        array (
          0 => 'ArrayList',
          1 => 'ArrayListIterator',
          2 => 'ArrayListIteratorAggregate',
          3 => 'CollectionError',
        ),
      ),
      'Configuration' => 
      array (
        'files' => 
        array (
          0 => 'Configuration',
          1 => 'ConfigurationCache',
          2 => 'GlobalConfiguration',
          3 => 'LocalConfiguration',
        ),
      ),
      'Controller' => 
      array (
        'files' => 
        array (
          0 => 'ControllerError',
          1 => 'DefaultController',
          2 => 'DefaultSessionController',
        ),
      ),
      'Core' => 
      array (
        'files' => 
        array (
          0 => 'autoLoad',
          1 => 'Browser',
          2 => 'Buffer',
          3 => 'Caller',
          4 => 'Compressor',
          5 => 'Enviroment',
          6 => 'Injection',
          7 => 'Load',
          8 => 'Log',
          9 => 'Object',
          10 => 'Serial',
          11 => 'Xml',
        ),
      ),
      'DateTime' => 
      array (
        'files' => 
        array (
          0 => 'Date',
          1 => 'DateTimeError',
          2 => 'TimeSpan',
        ),
      ),
      'Debug' => 
      array (
        'files' => 
        array (
          0 => 'DebugError',
          1 => 'Profiler',
        ),
      ),
      'Drawing' => 
      array (
        'files' => 
        array (
          0 => 'Image',
          1 => 'ImageError',
          2 => 'ImageInfo',
          3 => 'Thumb',
          4 => 'WaterMark',
        ),
      ),
      'Email' => 
      array (
        'files' => 
        array (
          0 => 'EmailError',
          1 => 'Mail',
          2 => 'SmtpConnection',
          3 => 'SmtpServer',
        ),
      ),
      'Error' => 
      array (
        'files' => 
        array (
          0 => 'Error',
          1 => 'Report',
        ),
      ),
      'Event' => 
      array (
        'files' => 
        array (
          0 => 'EventDispatcher',
          1 => 'EventError',
        ),
      ),
      'Format' => 
      array (
        'files' => 
        array (
          0 => 'FormatError',
          1 => 'Formatter',
        ),
      ),
      'Html' => 
      array (
        'files' => 
        array (
          0 => 'HtmlDocument',
          1 => 'HtmlElementList',
          2 => 'HtmlError',
          3 => 'HtmlParser',
          4 => 'HtmlPersistentDocument',
          5 => 'HtmlText',
          6 => 'HtmlTranslator',
        ),
      ),
      'Component' => 
      array (
        'files' => 
        array (
          0 => 'ErrorSummaryComponent',
          1 => 'FormComponent',
          2 => 'HtmlComponent',
          3 => 'INavigationComponent',
          4 => 'MenuComponent',
          5 => 'MessageComponent',
          6 => 'SiteNavigationComponent',
          7 => 'TablePaginateComponent',
        ),
      ),
      'Element' => 
      array (
        'files' => 
        array (
          0 => 'HtmlButton',
          1 => 'HtmlElement',
          2 => 'HtmlEvent',
          3 => 'HtmlIframe',
          4 => 'HtmlImage',
          5 => 'HtmlInput',
          6 => 'HtmlLabel',
          7 => 'HtmlLink',
          8 => 'HtmlState',
          9 => 'HtmlTable',
        ),
      ),
      'Form' => 
      array (
        'files' => 
        array (
          0 => 'HtmlSelect',
          1 => 'IHtmlFormElement',
          2 => 'InputCheckbox',
          3 => 'InputHidden',
          4 => 'InputPassword',
          5 => 'InputRadio',
          6 => 'InputText',
          7 => 'InputTextarea',
        ),
      ),
      'Http' => 
      array (
        'files' => 
        array (
          0 => 'CurrentHttpRequest',
          1 => 'CurrentHttpResponse',
          2 => 'HttpError',
          3 => 'HttpProxyAuthentication',
          4 => 'HttpRequest',
          5 => 'HttpResponse',
          6 => 'HttpTransport',
        ),
      ),
      'Cookies' => 
      array (
        'files' => 
        array (
          0 => 'Cookie',
          1 => 'CookieError',
          2 => 'CookiesList',
          3 => 'CookiesManager',
        ),
      ),
      'IO' => 
      array (
        'files' => 
        array (
          0 => 'Dir',
          1 => 'DirPath',
          2 => 'DirsListIterator',
          3 => 'File',
          4 => 'FilePath',
          5 => 'FilesListIterator',
          6 => 'IOError',
          7 => 'Path',
        ),
      ),
      'Lang' => 
      array (
        'files' => 
        array (
          0 => 'Language',
        ),
      ),
      'Minify' => 
      array (
        'files' => 
        array (
        ),
      ),
      'CssMin' => 
      array (
        'files' => 
        array (
          0 => 'CssMin',
          1 => 'CssMinFunctions',
        ),
      ),
      'JSMin' => 
      array (
        'files' => 
        array (
          0 => 'JSMin',
          1 => 'JSMinException',
        ),
      ),
      'ORM' => 
      array (
        'files' => 
        array (
        ),
      ),
      'Propel' => 
      array (
        'files' => 
        array (
          0 => 'CustomMySqlSchemaParser',
        ),
      ),
      'Resource' => 
      array (
        'files' => 
        array (
          0 => 'DefaultResourceController',
          1 => 'ResourceError',
          2 => 'ResourceFile',
          3 => 'ResourceLoader',
        ),
      ),
      'Router' => 
      array (
        'files' => 
        array (
          0 => 'Router',
          1 => 'RouterError',
        ),
      ),
      'Session' => 
      array (
        'files' => 
        array (
          0 => 'Session',
          1 => 'SessionCache',
        ),
      ),
      'Socket' => 
      array (
        'files' => 
        array (
          0 => 'SocketConnection',
          1 => 'SocketError',
        ),
      ),
      'Storage' => 
      array (
        'files' => 
        array (
        ),
      ),
      'Cache' => 
      array (
        'files' => 
        array (
          0 => 'Cache',
          1 => 'Cacheable',
          2 => 'CacheError',
          3 => 'CacheManager',
        ),
      ),
      'DataManager' => 
      array (
        'files' => 
        array (
          0 => 'DataError',
          1 => 'DataManager',
        ),
      ),
      'Strings' => 
      array (
        'files' => 
        array (
          0 => 'CamelCase',
          1 => 'Text',
        ),
      ),
      'SystemAccess' => 
      array (
        'files' => 
        array (
          0 => 'SystemAccessConfiguration',
          1 => 'SystemAccessError',
          2 => 'SystemAccessLogin',
          3 => 'SystemAccessManager',
          4 => 'SystemAccessPermission',
          5 => 'SystemAccessPersistence',
          6 => 'SystemAccessRole',
          7 => 'SystemAccessValidationType',
        ),
      ),
      'Threading' => 
      array (
        'files' => 
        array (
          0 => 'Thread',
          1 => 'ThreadError',
          2 => 'ThreadWorker',
          3 => 'ThreadWorkerPool',
        ),
      ),
      'Upload' => 
      array (
        'files' => 
        array (
          0 => 'FileUpload',
          1 => 'UploadError',
          2 => 'UploadManager',
        ),
      ),
      'Validation' => 
      array (
        'files' => 
        array (
          0 => 'ErrorsList',
          1 => 'InputField',
          2 => 'InputRule',
          3 => 'InputsList',
          4 => 'Rule',
          5 => 'ValidationError',
          6 => 'ValidationResult',
          7 => 'Validator',
        ),
      ),
      'View' => 
      array (
        'files' => 
        array (
          0 => 'DefaultView',
          1 => 'ViewError',
        ),
      ),
    ),
  ),
  'default' => 
  array (
    'files' => 
    array (
      'AppMenuComponent' => 
      array (
        'file' => 'apps/default/components/AppMenuComponent.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'MenuComponent',
        ),
      ),
      'ButtonGroupComponent' => 
      array (
        'file' => 'apps/default/components/ButtonGroupComponent.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'HtmlComponent',
        ),
      ),
      'CheckAllComponent' => 
      array (
        'file' => 'apps/default/components/CheckAllComponent.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'HtmlComponent',
        ),
      ),
      'CheckboxComponent' => 
      array (
        'file' => 'apps/default/components/CheckboxComponent.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'HtmlComponent',
        ),
      ),
      'CheckListComponent' => 
      array (
        'file' => 'apps/default/components/CheckListComponent.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'HtmlComponent',
        ),
      ),
      'DateSelectComponent' => 
      array (
        'file' => 'apps/default/components/DateSelectComponent.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'HtmlComponent',
        ),
      ),
      'ErrorComponent' => 
      array (
        'file' => 'apps/default/components/ErrorComponent.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'MessageComponent',
        ),
      ),
      'FilterComponent' => 
      array (
        'file' => 'apps/default/components/FilterComponent.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'HtmlComponent',
        ),
      ),
      'FilterContainerComponent' => 
      array (
        'file' => 'apps/default/components/FilterContainerComponent.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'HtmlComponent',
        ),
      ),
      'FormResearchComponent' => 
      array (
        'file' => 'apps/default/components/FormResearchComponent.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'HtmlComponent',
        ),
      ),
      'RequiredFieldIndicatorComponent' => 
      array (
        'file' => 'apps/default/components/RequiredFieldIndicatorComponent.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'HtmlComponent',
        ),
      ),
      'StoryComponent' => 
      array (
        'file' => 'apps/default/components/StoryComponent.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'HtmlComponent',
        ),
      ),
      'ApiController' => 
      array (
        'file' => 'apps/default/layers/control/page/ApiController.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'DefaultPageController',
        ),
      ),
      'DashboardController' => 
      array (
        'file' => 'apps/default/layers/control/page/DashboardController.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'DefaultPageController',
        ),
      ),
      'LoginController' => 
      array (
        'file' => 'apps/default/layers/control/page/LoginController.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'DefaultPageController',
        ),
      ),
      'UsuarioController' => 
      array (
        'file' => 'apps/default/layers/control/page/UsuarioController.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'DefaultPageController',
        ),
      ),
      'BaseHtmlHelper' => 
      array (
        'file' => 'apps/default/layers/control/utils/BaseHtmlHelper.php',
        'uses' => NULL,
        'extends' => NULL,
      ),
      'HtmlHelper' => 
      array (
        'file' => 'apps/default/layers/control/utils/HtmlHelper.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseHtmlHelper',
        ),
      ),
      'Utils' => 
      array (
        'file' => 'apps/default/layers/control/utils/Utils.php',
        'uses' => NULL,
        'extends' => NULL,
      ),
      'DefaultPageController' => 
      array (
        'file' => 'apps/default/layers/control/DefaultPageController.php',
        'uses' => 
        array (
          0 => 'Error',
        ),
        'extends' => 
        array (
          0 => 'DefaultController',
        ),
      ),
      'Alternativa' => 
      array (
        'file' => 'apps/default/layers/model/Default/Alternativa.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseAlternativa',
        ),
      ),
      'AlternativaPeer' => 
      array (
        'file' => 'apps/default/layers/model/Default/AlternativaPeer.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseAlternativaPeer',
        ),
      ),
      'AlternativaQuery' => 
      array (
        'file' => 'apps/default/layers/model/Default/AlternativaQuery.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseAlternativaQuery',
        ),
      ),
      'Auditoria' => 
      array (
        'file' => 'apps/default/layers/model/Default/Auditoria.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseAuditoria',
        ),
      ),
      'AuditoriaPeer' => 
      array (
        'file' => 'apps/default/layers/model/Default/AuditoriaPeer.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseAuditoriaPeer',
        ),
      ),
      'AuditoriaQuery' => 
      array (
        'file' => 'apps/default/layers/model/Default/AuditoriaQuery.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseAuditoriaQuery',
        ),
      ),
      'AvaliacaoRespostaForum' => 
      array (
        'file' => 'apps/default/layers/model/Default/AvaliacaoRespostaForum.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseAvaliacaoRespostaForum',
        ),
      ),
      'AvaliacaoRespostaForumPeer' => 
      array (
        'file' => 'apps/default/layers/model/Default/AvaliacaoRespostaForumPeer.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseAvaliacaoRespostaForumPeer',
        ),
      ),
      'AvaliacaoRespostaForumQuery' => 
      array (
        'file' => 'apps/default/layers/model/Default/AvaliacaoRespostaForumQuery.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseAvaliacaoRespostaForumQuery',
        ),
      ),
      'Cargo' => 
      array (
        'file' => 'apps/default/layers/model/Default/Cargo.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseCargo',
        ),
      ),
      'CargoPeer' => 
      array (
        'file' => 'apps/default/layers/model/Default/CargoPeer.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseCargoPeer',
        ),
      ),
      'CargoPesquisa' => 
      array (
        'file' => 'apps/default/layers/model/Default/CargoPesquisa.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseCargoPesquisa',
        ),
      ),
      'CargoPesquisaPeer' => 
      array (
        'file' => 'apps/default/layers/model/Default/CargoPesquisaPeer.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseCargoPesquisaPeer',
        ),
      ),
      'CargoPesquisaQuery' => 
      array (
        'file' => 'apps/default/layers/model/Default/CargoPesquisaQuery.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseCargoPesquisaQuery',
        ),
      ),
      'CargoQuery' => 
      array (
        'file' => 'apps/default/layers/model/Default/CargoQuery.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseCargoQuery',
        ),
      ),
      'Categoria' => 
      array (
        'file' => 'apps/default/layers/model/Default/Categoria.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseCategoria',
        ),
      ),
      'CategoriaPeer' => 
      array (
        'file' => 'apps/default/layers/model/Default/CategoriaPeer.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseCategoriaPeer',
        ),
      ),
      'CategoriaQuery' => 
      array (
        'file' => 'apps/default/layers/model/Default/CategoriaQuery.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseCategoriaQuery',
        ),
      ),
      'ColetaPesquisa' => 
      array (
        'file' => 'apps/default/layers/model/Default/ColetaPesquisa.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseColetaPesquisa',
        ),
      ),
      'ColetaPesquisaPeer' => 
      array (
        'file' => 'apps/default/layers/model/Default/ColetaPesquisaPeer.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseColetaPesquisaPeer',
        ),
      ),
      'ColetaPesquisaQuery' => 
      array (
        'file' => 'apps/default/layers/model/Default/ColetaPesquisaQuery.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseColetaPesquisaQuery',
        ),
      ),
      'ComentarioNoticia' => 
      array (
        'file' => 'apps/default/layers/model/Default/ComentarioNoticia.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseComentarioNoticia',
        ),
      ),
      'ComentarioNoticiaPeer' => 
      array (
        'file' => 'apps/default/layers/model/Default/ComentarioNoticiaPeer.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseComentarioNoticiaPeer',
        ),
      ),
      'ComentarioNoticiaQuery' => 
      array (
        'file' => 'apps/default/layers/model/Default/ComentarioNoticiaQuery.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseComentarioNoticiaQuery',
        ),
      ),
      'CurtidaForum' => 
      array (
        'file' => 'apps/default/layers/model/Default/CurtidaForum.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseCurtidaForum',
        ),
      ),
      'CurtidaForumPeer' => 
      array (
        'file' => 'apps/default/layers/model/Default/CurtidaForumPeer.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseCurtidaForumPeer',
        ),
      ),
      'CurtidaForumQuery' => 
      array (
        'file' => 'apps/default/layers/model/Default/CurtidaForumQuery.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseCurtidaForumQuery',
        ),
      ),
      'Departamento' => 
      array (
        'file' => 'apps/default/layers/model/Default/Departamento.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseDepartamento',
        ),
      ),
      'DepartamentoPeer' => 
      array (
        'file' => 'apps/default/layers/model/Default/DepartamentoPeer.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseDepartamentoPeer',
        ),
      ),
      'DepartamentoPesquisa' => 
      array (
        'file' => 'apps/default/layers/model/Default/DepartamentoPesquisa.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseDepartamentoPesquisa',
        ),
      ),
      'DepartamentoPesquisaPeer' => 
      array (
        'file' => 'apps/default/layers/model/Default/DepartamentoPesquisaPeer.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseDepartamentoPesquisaPeer',
        ),
      ),
      'DepartamentoPesquisaQuery' => 
      array (
        'file' => 'apps/default/layers/model/Default/DepartamentoPesquisaQuery.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseDepartamentoPesquisaQuery',
        ),
      ),
      'DepartamentoQuery' => 
      array (
        'file' => 'apps/default/layers/model/Default/DepartamentoQuery.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseDepartamentoQuery',
        ),
      ),
      'Endereco' => 
      array (
        'file' => 'apps/default/layers/model/Default/Endereco.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseEndereco',
        ),
      ),
      'EnderecoCorreio' => 
      array (
        'file' => 'apps/default/layers/model/Default/EnderecoCorreio.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseEnderecoCorreio',
        ),
      ),
      'EnderecoCorreioPeer' => 
      array (
        'file' => 'apps/default/layers/model/Default/EnderecoCorreioPeer.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseEnderecoCorreioPeer',
        ),
      ),
      'EnderecoCorreioQuery' => 
      array (
        'file' => 'apps/default/layers/model/Default/EnderecoCorreioQuery.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseEnderecoCorreioQuery',
        ),
      ),
      'EnderecoPeer' => 
      array (
        'file' => 'apps/default/layers/model/Default/EnderecoPeer.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseEnderecoPeer',
        ),
      ),
      'EnderecoQuery' => 
      array (
        'file' => 'apps/default/layers/model/Default/EnderecoQuery.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseEnderecoQuery',
        ),
      ),
      'Forum' => 
      array (
        'file' => 'apps/default/layers/model/Default/Forum.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseForum',
        ),
      ),
      'ForumPeer' => 
      array (
        'file' => 'apps/default/layers/model/Default/ForumPeer.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseForumPeer',
        ),
      ),
      'ForumQuery' => 
      array (
        'file' => 'apps/default/layers/model/Default/ForumQuery.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseForumQuery',
        ),
      ),
      'Noticia' => 
      array (
        'file' => 'apps/default/layers/model/Default/Noticia.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseNoticia',
        ),
      ),
      'NoticiaPeer' => 
      array (
        'file' => 'apps/default/layers/model/Default/NoticiaPeer.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseNoticiaPeer',
        ),
      ),
      'NoticiaQuery' => 
      array (
        'file' => 'apps/default/layers/model/Default/NoticiaQuery.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseNoticiaQuery',
        ),
      ),
      'Perfil' => 
      array (
        'file' => 'apps/default/layers/model/Default/Perfil.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BasePerfil',
        ),
      ),
      'PerfilPeer' => 
      array (
        'file' => 'apps/default/layers/model/Default/PerfilPeer.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BasePerfilPeer',
        ),
      ),
      'PerfilPermissao' => 
      array (
        'file' => 'apps/default/layers/model/Default/PerfilPermissao.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BasePerfilPermissao',
        ),
      ),
      'PerfilPermissaoPeer' => 
      array (
        'file' => 'apps/default/layers/model/Default/PerfilPermissaoPeer.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BasePerfilPermissaoPeer',
        ),
      ),
      'PerfilPermissaoQuery' => 
      array (
        'file' => 'apps/default/layers/model/Default/PerfilPermissaoQuery.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BasePerfilPermissaoQuery',
        ),
      ),
      'PerfilQuery' => 
      array (
        'file' => 'apps/default/layers/model/Default/PerfilQuery.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BasePerfilQuery',
        ),
      ),
      'Pergunta' => 
      array (
        'file' => 'apps/default/layers/model/Default/Pergunta.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BasePergunta',
        ),
      ),
      'PerguntaPeer' => 
      array (
        'file' => 'apps/default/layers/model/Default/PerguntaPeer.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BasePerguntaPeer',
        ),
      ),
      'PerguntaQuery' => 
      array (
        'file' => 'apps/default/layers/model/Default/PerguntaQuery.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BasePerguntaQuery',
        ),
      ),
      'Permissao' => 
      array (
        'file' => 'apps/default/layers/model/Default/Permissao.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BasePermissao',
        ),
      ),
      'PermissaoPeer' => 
      array (
        'file' => 'apps/default/layers/model/Default/PermissaoPeer.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BasePermissaoPeer',
        ),
      ),
      'PermissaoQuery' => 
      array (
        'file' => 'apps/default/layers/model/Default/PermissaoQuery.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BasePermissaoQuery',
        ),
      ),
      'Pesquisa' => 
      array (
        'file' => 'apps/default/layers/model/Default/Pesquisa.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BasePesquisa',
        ),
      ),
      'PesquisaHabilitada' => 
      array (
        'file' => 'apps/default/layers/model/Default/PesquisaHabilitada.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BasePesquisaHabilitada',
        ),
      ),
      'PesquisaHabilitadaPeer' => 
      array (
        'file' => 'apps/default/layers/model/Default/PesquisaHabilitadaPeer.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BasePesquisaHabilitadaPeer',
        ),
      ),
      'PesquisaHabilitadaQuery' => 
      array (
        'file' => 'apps/default/layers/model/Default/PesquisaHabilitadaQuery.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BasePesquisaHabilitadaQuery',
        ),
      ),
      'PesquisaPeer' => 
      array (
        'file' => 'apps/default/layers/model/Default/PesquisaPeer.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BasePesquisaPeer',
        ),
      ),
      'PesquisaQuery' => 
      array (
        'file' => 'apps/default/layers/model/Default/PesquisaQuery.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BasePesquisaQuery',
        ),
      ),
      'Premio' => 
      array (
        'file' => 'apps/default/layers/model/Default/Premio.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BasePremio',
        ),
      ),
      'PremioPeer' => 
      array (
        'file' => 'apps/default/layers/model/Default/PremioPeer.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BasePremioPeer',
        ),
      ),
      'PremioQuery' => 
      array (
        'file' => 'apps/default/layers/model/Default/PremioQuery.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BasePremioQuery',
        ),
      ),
      'Resposta' => 
      array (
        'file' => 'apps/default/layers/model/Default/Resposta.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseResposta',
        ),
      ),
      'RespostaForum' => 
      array (
        'file' => 'apps/default/layers/model/Default/RespostaForum.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseRespostaForum',
        ),
      ),
      'RespostaForumPeer' => 
      array (
        'file' => 'apps/default/layers/model/Default/RespostaForumPeer.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseRespostaForumPeer',
        ),
      ),
      'RespostaForumQuery' => 
      array (
        'file' => 'apps/default/layers/model/Default/RespostaForumQuery.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseRespostaForumQuery',
        ),
      ),
      'RespostaPeer' => 
      array (
        'file' => 'apps/default/layers/model/Default/RespostaPeer.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseRespostaPeer',
        ),
      ),
      'RespostaQuery' => 
      array (
        'file' => 'apps/default/layers/model/Default/RespostaQuery.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseRespostaQuery',
        ),
      ),
      'SolicitacaoResgate' => 
      array (
        'file' => 'apps/default/layers/model/Default/SolicitacaoResgate.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseSolicitacaoResgate',
        ),
      ),
      'SolicitacaoResgatePeer' => 
      array (
        'file' => 'apps/default/layers/model/Default/SolicitacaoResgatePeer.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseSolicitacaoResgatePeer',
        ),
      ),
      'SolicitacaoResgateQuery' => 
      array (
        'file' => 'apps/default/layers/model/Default/SolicitacaoResgateQuery.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseSolicitacaoResgateQuery',
        ),
      ),
      'Usuario' => 
      array (
        'file' => 'apps/default/layers/model/Default/Usuario.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseUsuario',
        ),
      ),
      'UsuarioFilial' => 
      array (
        'file' => 'apps/default/layers/model/Default/UsuarioFilial.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseUsuarioFilial',
        ),
      ),
      'UsuarioFilialPeer' => 
      array (
        'file' => 'apps/default/layers/model/Default/UsuarioFilialPeer.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseUsuarioFilialPeer',
        ),
      ),
      'UsuarioFilialQuery' => 
      array (
        'file' => 'apps/default/layers/model/Default/UsuarioFilialQuery.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseUsuarioFilialQuery',
        ),
      ),
      'UsuarioPeer' => 
      array (
        'file' => 'apps/default/layers/model/Default/UsuarioPeer.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseUsuarioPeer',
        ),
      ),
      'UsuarioPermissao' => 
      array (
        'file' => 'apps/default/layers/model/Default/UsuarioPermissao.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseUsuarioPermissao',
        ),
      ),
      'UsuarioPermissaoPeer' => 
      array (
        'file' => 'apps/default/layers/model/Default/UsuarioPermissaoPeer.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseUsuarioPermissaoPeer',
        ),
      ),
      'UsuarioPermissaoQuery' => 
      array (
        'file' => 'apps/default/layers/model/Default/UsuarioPermissaoQuery.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseUsuarioPermissaoQuery',
        ),
      ),
      'UsuarioQuery' => 
      array (
        'file' => 'apps/default/layers/model/Default/UsuarioQuery.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseUsuarioQuery',
        ),
      ),
      'ValorPontoAvaliacaoForum' => 
      array (
        'file' => 'apps/default/layers/model/Default/ValorPontoAvaliacaoForum.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseValorPontoAvaliacaoForum',
        ),
      ),
      'ValorPontoAvaliacaoForumPeer' => 
      array (
        'file' => 'apps/default/layers/model/Default/ValorPontoAvaliacaoForumPeer.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseValorPontoAvaliacaoForumPeer',
        ),
      ),
      'ValorPontoAvaliacaoForumQuery' => 
      array (
        'file' => 'apps/default/layers/model/Default/ValorPontoAvaliacaoForumQuery.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseValorPontoAvaliacaoForumQuery',
        ),
      ),
      'AdvogadoAreaAdvocaciaTableMap' => 
      array (
        'file' => 'apps/default/layers/model/Default/map/AdvogadoAreaAdvocaciaTableMap.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'TableMap',
        ),
      ),
      'AdvogadoClienteTableMap' => 
      array (
        'file' => 'apps/default/layers/model/Default/map/AdvogadoClienteTableMap.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'TableMap',
        ),
      ),
      'AdvogadoContatoTableMap' => 
      array (
        'file' => 'apps/default/layers/model/Default/map/AdvogadoContatoTableMap.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'TableMap',
        ),
      ),
      'AdvogadoInscricaoOabTableMap' => 
      array (
        'file' => 'apps/default/layers/model/Default/map/AdvogadoInscricaoOabTableMap.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'TableMap',
        ),
      ),
      'AdvogadoInscricaoTableMap' => 
      array (
        'file' => 'apps/default/layers/model/Default/map/AdvogadoInscricaoTableMap.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'TableMap',
        ),
      ),
      'AdvogadoTableMap' => 
      array (
        'file' => 'apps/default/layers/model/Default/map/AdvogadoTableMap.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'TableMap',
        ),
      ),
      'AgendaIgrejaTableMap' => 
      array (
        'file' => 'apps/default/layers/model/Default/map/AgendaIgrejaTableMap.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'TableMap',
        ),
      ),
      'AgendaTableMap' => 
      array (
        'file' => 'apps/default/layers/model/Default/map/AgendaTableMap.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'TableMap',
        ),
      ),
      'AlternativaTableMap' => 
      array (
        'file' => 'apps/default/layers/model/Default/map/AlternativaTableMap.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'TableMap',
        ),
      ),
      'AndamentoProcessoTableMap' => 
      array (
        'file' => 'apps/default/layers/model/Default/map/AndamentoProcessoTableMap.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'TableMap',
        ),
      ),
      'AnotacaoCasoTableMap' => 
      array (
        'file' => 'apps/default/layers/model/Default/map/AnotacaoCasoTableMap.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'TableMap',
        ),
      ),
      'AnotacaoProcessoTableMap' => 
      array (
        'file' => 'apps/default/layers/model/Default/map/AnotacaoProcessoTableMap.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'TableMap',
        ),
      ),
      'AreaAdvocaciaTableMap' => 
      array (
        'file' => 'apps/default/layers/model/Default/map/AreaAdvocaciaTableMap.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'TableMap',
        ),
      ),
      'AuditoriaTableMap' => 
      array (
        'file' => 'apps/default/layers/model/Default/map/AuditoriaTableMap.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'TableMap',
        ),
      ),
      'AUsuarioPermissaoTableMap' => 
      array (
        'file' => 'apps/default/layers/model/Default/map/AUsuarioPermissaoTableMap.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'TableMap',
        ),
      ),
      'AvaliacaoAdvogadoTableMap' => 
      array (
        'file' => 'apps/default/layers/model/Default/map/AvaliacaoAdvogadoTableMap.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'TableMap',
        ),
      ),
      'AvaliacaoClienteTableMap' => 
      array (
        'file' => 'apps/default/layers/model/Default/map/AvaliacaoClienteTableMap.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'TableMap',
        ),
      ),
      'AvaliacaoRespostaForumTableMap' => 
      array (
        'file' => 'apps/default/layers/model/Default/map/AvaliacaoRespostaForumTableMap.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'TableMap',
        ),
      ),
      'CargoPesquisaTableMap' => 
      array (
        'file' => 'apps/default/layers/model/Default/map/CargoPesquisaTableMap.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'TableMap',
        ),
      ),
      'CargoTableMap' => 
      array (
        'file' => 'apps/default/layers/model/Default/map/CargoTableMap.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'TableMap',
        ),
      ),
      'CasoProcessoTableMap' => 
      array (
        'file' => 'apps/default/layers/model/Default/map/CasoProcessoTableMap.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'TableMap',
        ),
      ),
      'CasoRelatoTableMap' => 
      array (
        'file' => 'apps/default/layers/model/Default/map/CasoRelatoTableMap.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'TableMap',
        ),
      ),
      'CasoTableMap' => 
      array (
        'file' => 'apps/default/layers/model/Default/map/CasoTableMap.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'TableMap',
        ),
      ),
      'CategoriaTableMap' => 
      array (
        'file' => 'apps/default/layers/model/Default/map/CategoriaTableMap.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'TableMap',
        ),
      ),
      'CidadeTableMap' => 
      array (
        'file' => 'apps/default/layers/model/Default/map/CidadeTableMap.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'TableMap',
        ),
      ),
      'ClienteContatoTableMap' => 
      array (
        'file' => 'apps/default/layers/model/Default/map/ClienteContatoTableMap.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'TableMap',
        ),
      ),
      'ClienteTableMap' => 
      array (
        'file' => 'apps/default/layers/model/Default/map/ClienteTableMap.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'TableMap',
        ),
      ),
      'ColetaPesquisaTableMap' => 
      array (
        'file' => 'apps/default/layers/model/Default/map/ColetaPesquisaTableMap.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'TableMap',
        ),
      ),
      'ComentarioNoticiaTableMap' => 
      array (
        'file' => 'apps/default/layers/model/Default/map/ComentarioNoticiaTableMap.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'TableMap',
        ),
      ),
      'ComunicadoTableMap' => 
      array (
        'file' => 'apps/default/layers/model/Default/map/ComunicadoTableMap.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'TableMap',
        ),
      ),
      'ContatoIgrejaTableMap' => 
      array (
        'file' => 'apps/default/layers/model/Default/map/ContatoIgrejaTableMap.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'TableMap',
        ),
      ),
      'ContatoTableMap' => 
      array (
        'file' => 'apps/default/layers/model/Default/map/ContatoTableMap.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'TableMap',
        ),
      ),
      'ContratoTableMap' => 
      array (
        'file' => 'apps/default/layers/model/Default/map/ContratoTableMap.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'TableMap',
        ),
      ),
      'CurtidaForumTableMap' => 
      array (
        'file' => 'apps/default/layers/model/Default/map/CurtidaForumTableMap.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'TableMap',
        ),
      ),
      'DepartamentoPesquisaTableMap' => 
      array (
        'file' => 'apps/default/layers/model/Default/map/DepartamentoPesquisaTableMap.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'TableMap',
        ),
      ),
      'DepartamentoTableMap' => 
      array (
        'file' => 'apps/default/layers/model/Default/map/DepartamentoTableMap.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'TableMap',
        ),
      ),
      'Endereco1TableMap' => 
      array (
        'file' => 'apps/default/layers/model/Default/map/Endereco1TableMap.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'TableMap',
        ),
      ),
      'EnderecoCorreioTableMap' => 
      array (
        'file' => 'apps/default/layers/model/Default/map/EnderecoCorreioTableMap.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'TableMap',
        ),
      ),
      'EnderecoTableMap' => 
      array (
        'file' => 'apps/default/layers/model/Default/map/EnderecoTableMap.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'TableMap',
        ),
      ),
      'FaseProcessoTableMap' => 
      array (
        'file' => 'apps/default/layers/model/Default/map/FaseProcessoTableMap.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'TableMap',
        ),
      ),
      'FilhoMembroTableMap' => 
      array (
        'file' => 'apps/default/layers/model/Default/map/FilhoMembroTableMap.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'TableMap',
        ),
      ),
      'FormularioTableMap' => 
      array (
        'file' => 'apps/default/layers/model/Default/map/FormularioTableMap.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'TableMap',
        ),
      ),
      'ForumTableMap' => 
      array (
        'file' => 'apps/default/layers/model/Default/map/ForumTableMap.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'TableMap',
        ),
      ),
      'GravacaoTableMap' => 
      array (
        'file' => 'apps/default/layers/model/Default/map/GravacaoTableMap.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'TableMap',
        ),
      ),
      'IgrejaTableMap' => 
      array (
        'file' => 'apps/default/layers/model/Default/map/IgrejaTableMap.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'TableMap',
        ),
      ),
      'LiderMinisterioTableMap' => 
      array (
        'file' => 'apps/default/layers/model/Default/map/LiderMinisterioTableMap.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'TableMap',
        ),
      ),
      'LocalizacaoAdvogadoTableMap' => 
      array (
        'file' => 'apps/default/layers/model/Default/map/LocalizacaoAdvogadoTableMap.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'TableMap',
        ),
      ),
      'MembroTableMap' => 
      array (
        'file' => 'apps/default/layers/model/Default/map/MembroTableMap.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'TableMap',
        ),
      ),
      'MensagemTableMap' => 
      array (
        'file' => 'apps/default/layers/model/Default/map/MensagemTableMap.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'TableMap',
        ),
      ),
      'MetaPublicoAlvoTableMap' => 
      array (
        'file' => 'apps/default/layers/model/Default/map/MetaPublicoAlvoTableMap.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'TableMap',
        ),
      ),
      'MinisterioTableMap' => 
      array (
        'file' => 'apps/default/layers/model/Default/map/MinisterioTableMap.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'TableMap',
        ),
      ),
      'NoticiaIgrejaTableMap' => 
      array (
        'file' => 'apps/default/layers/model/Default/map/NoticiaIgrejaTableMap.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'TableMap',
        ),
      ),
      'NoticiaTableMap' => 
      array (
        'file' => 'apps/default/layers/model/Default/map/NoticiaTableMap.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'TableMap',
        ),
      ),
      'ParentescoTableMap' => 
      array (
        'file' => 'apps/default/layers/model/Default/map/ParentescoTableMap.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'TableMap',
        ),
      ),
      'PedidoOracaoTableMap' => 
      array (
        'file' => 'apps/default/layers/model/Default/map/PedidoOracaoTableMap.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'TableMap',
        ),
      ),
      'PerfilPermissaoTableMap' => 
      array (
        'file' => 'apps/default/layers/model/Default/map/PerfilPermissaoTableMap.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'TableMap',
        ),
      ),
      'PerfilTableMap' => 
      array (
        'file' => 'apps/default/layers/model/Default/map/PerfilTableMap.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'TableMap',
        ),
      ),
      'PerguntaOpcaoTableMap' => 
      array (
        'file' => 'apps/default/layers/model/Default/map/PerguntaOpcaoTableMap.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'TableMap',
        ),
      ),
      'PerguntaTableMap' => 
      array (
        'file' => 'apps/default/layers/model/Default/map/PerguntaTableMap.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'TableMap',
        ),
      ),
      'PermissaoTableMap' => 
      array (
        'file' => 'apps/default/layers/model/Default/map/PermissaoTableMap.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'TableMap',
        ),
      ),
      'PesquisaHabilitadaTableMap' => 
      array (
        'file' => 'apps/default/layers/model/Default/map/PesquisaHabilitadaTableMap.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'TableMap',
        ),
      ),
      'PesquisaTableMap' => 
      array (
        'file' => 'apps/default/layers/model/Default/map/PesquisaTableMap.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'TableMap',
        ),
      ),
      'PesquisaUsuarioTableMap' => 
      array (
        'file' => 'apps/default/layers/model/Default/map/PesquisaUsuarioTableMap.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'TableMap',
        ),
      ),
      'PessoaTableMap' => 
      array (
        'file' => 'apps/default/layers/model/Default/map/PessoaTableMap.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'TableMap',
        ),
      ),
      'PgMembroTableMap' => 
      array (
        'file' => 'apps/default/layers/model/Default/map/PgMembroTableMap.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'TableMap',
        ),
      ),
      'PgTableMap' => 
      array (
        'file' => 'apps/default/layers/model/Default/map/PgTableMap.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'TableMap',
        ),
      ),
      'PgUsuarioTableMap' => 
      array (
        'file' => 'apps/default/layers/model/Default/map/PgUsuarioTableMap.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'TableMap',
        ),
      ),
      'PodcastIgrejaTableMap' => 
      array (
        'file' => 'apps/default/layers/model/Default/map/PodcastIgrejaTableMap.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'TableMap',
        ),
      ),
      'PodcastTableMap' => 
      array (
        'file' => 'apps/default/layers/model/Default/map/PodcastTableMap.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'TableMap',
        ),
      ),
      'PremioTableMap' => 
      array (
        'file' => 'apps/default/layers/model/Default/map/PremioTableMap.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'TableMap',
        ),
      ),
      'ProcessoCasoTableMap' => 
      array (
        'file' => 'apps/default/layers/model/Default/map/ProcessoCasoTableMap.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'TableMap',
        ),
      ),
      'ProcessoRelatoTableMap' => 
      array (
        'file' => 'apps/default/layers/model/Default/map/ProcessoRelatoTableMap.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'TableMap',
        ),
      ),
      'ProcessoTableMap' => 
      array (
        'file' => 'apps/default/layers/model/Default/map/ProcessoTableMap.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'TableMap',
        ),
      ),
      'ProfissaoTableMap' => 
      array (
        'file' => 'apps/default/layers/model/Default/map/ProfissaoTableMap.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'TableMap',
        ),
      ),
      'PublicoAlvoTableMap' => 
      array (
        'file' => 'apps/default/layers/model/Default/map/PublicoAlvoTableMap.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'TableMap',
        ),
      ),
      'RelatoTableMap' => 
      array (
        'file' => 'apps/default/layers/model/Default/map/RelatoTableMap.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'TableMap',
        ),
      ),
      'RespostaForumTableMap' => 
      array (
        'file' => 'apps/default/layers/model/Default/map/RespostaForumTableMap.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'TableMap',
        ),
      ),
      'RespostaOpcaoTableMap' => 
      array (
        'file' => 'apps/default/layers/model/Default/map/RespostaOpcaoTableMap.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'TableMap',
        ),
      ),
      'RespostaTableMap' => 
      array (
        'file' => 'apps/default/layers/model/Default/map/RespostaTableMap.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'TableMap',
        ),
      ),
      'SolicitacaoResgateTableMap' => 
      array (
        'file' => 'apps/default/layers/model/Default/map/SolicitacaoResgateTableMap.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'TableMap',
        ),
      ),
      'SolicitacaoTableMap' => 
      array (
        'file' => 'apps/default/layers/model/Default/map/SolicitacaoTableMap.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'TableMap',
        ),
      ),
      'TabelaHonorarioOabTableMap' => 
      array (
        'file' => 'apps/default/layers/model/Default/map/TabelaHonorarioOabTableMap.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'TableMap',
        ),
      ),
      'TabulacaoTableMap' => 
      array (
        'file' => 'apps/default/layers/model/Default/map/TabulacaoTableMap.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'TableMap',
        ),
      ),
      'TagAreaAdvocaciaTableMap' => 
      array (
        'file' => 'apps/default/layers/model/Default/map/TagAreaAdvocaciaTableMap.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'TableMap',
        ),
      ),
      'TipoUsuarioTableMap' => 
      array (
        'file' => 'apps/default/layers/model/Default/map/TipoUsuarioTableMap.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'TableMap',
        ),
      ),
      'TituloTableMap' => 
      array (
        'file' => 'apps/default/layers/model/Default/map/TituloTableMap.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'TableMap',
        ),
      ),
      'TPermissaoTableMap' => 
      array (
        'file' => 'apps/default/layers/model/Default/map/TPermissaoTableMap.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'TableMap',
        ),
      ),
      'TribunalTableMap' => 
      array (
        'file' => 'apps/default/layers/model/Default/map/TribunalTableMap.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'TableMap',
        ),
      ),
      'UfTableMap' => 
      array (
        'file' => 'apps/default/layers/model/Default/map/UfTableMap.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'TableMap',
        ),
      ),
      'UsuarioFilialTableMap' => 
      array (
        'file' => 'apps/default/layers/model/Default/map/UsuarioFilialTableMap.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'TableMap',
        ),
      ),
      'UsuarioIgrejaTableMap' => 
      array (
        'file' => 'apps/default/layers/model/Default/map/UsuarioIgrejaTableMap.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'TableMap',
        ),
      ),
      'UsuarioPermissaoTableMap' => 
      array (
        'file' => 'apps/default/layers/model/Default/map/UsuarioPermissaoTableMap.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'TableMap',
        ),
      ),
      'UsuarioTableMap' => 
      array (
        'file' => 'apps/default/layers/model/Default/map/UsuarioTableMap.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'TableMap',
        ),
      ),
      'ValorPontoAvaliacaoForumTableMap' => 
      array (
        'file' => 'apps/default/layers/model/Default/map/ValorPontoAvaliacaoForumTableMap.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'TableMap',
        ),
      ),
      'VideoIgrejaTableMap' => 
      array (
        'file' => 'apps/default/layers/model/Default/map/VideoIgrejaTableMap.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'TableMap',
        ),
      ),
      'VideoTableMap' => 
      array (
        'file' => 'apps/default/layers/model/Default/map/VideoTableMap.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'TableMap',
        ),
      ),
      'BaseAdvogado' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseAdvogado.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseObject',
          1 => 'Persistent',
        ),
      ),
      'BaseAdvogadoAreaAdvocacia' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseAdvogadoAreaAdvocacia.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseObject',
          1 => 'Persistent',
        ),
      ),
      'BaseAdvogadoAreaAdvocaciaPeer' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseAdvogadoAreaAdvocaciaPeer.php',
        'uses' => NULL,
        'extends' => NULL,
      ),
      'BaseAdvogadoAreaAdvocaciaQuery' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseAdvogadoAreaAdvocaciaQuery.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'ModelCriteria',
        ),
      ),
      'BaseAdvogadoCliente' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseAdvogadoCliente.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseObject',
          1 => 'Persistent',
        ),
      ),
      'BaseAdvogadoClientePeer' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseAdvogadoClientePeer.php',
        'uses' => NULL,
        'extends' => NULL,
      ),
      'BaseAdvogadoClienteQuery' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseAdvogadoClienteQuery.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'ModelCriteria',
        ),
      ),
      'BaseAdvogadoContato' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseAdvogadoContato.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseObject',
          1 => 'Persistent',
        ),
      ),
      'BaseAdvogadoContatoPeer' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseAdvogadoContatoPeer.php',
        'uses' => NULL,
        'extends' => NULL,
      ),
      'BaseAdvogadoContatoQuery' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseAdvogadoContatoQuery.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'ModelCriteria',
        ),
      ),
      'BaseAdvogadoInscricao' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseAdvogadoInscricao.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseObject',
          1 => 'Persistent',
        ),
      ),
      'BaseAdvogadoInscricaoOab' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseAdvogadoInscricaoOab.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseObject',
          1 => 'Persistent',
        ),
      ),
      'BaseAdvogadoInscricaoOabPeer' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseAdvogadoInscricaoOabPeer.php',
        'uses' => NULL,
        'extends' => NULL,
      ),
      'BaseAdvogadoInscricaoOabQuery' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseAdvogadoInscricaoOabQuery.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'ModelCriteria',
        ),
      ),
      'BaseAdvogadoInscricaoPeer' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseAdvogadoInscricaoPeer.php',
        'uses' => NULL,
        'extends' => NULL,
      ),
      'BaseAdvogadoInscricaoQuery' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseAdvogadoInscricaoQuery.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'ModelCriteria',
        ),
      ),
      'BaseAdvogadoPeer' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseAdvogadoPeer.php',
        'uses' => NULL,
        'extends' => NULL,
      ),
      'BaseAdvogadoQuery' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseAdvogadoQuery.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'ModelCriteria',
        ),
      ),
      'BaseAgenda' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseAgenda.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseObject',
          1 => 'Persistent',
        ),
      ),
      'BaseAgendaIgreja' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseAgendaIgreja.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseObject',
          1 => 'Persistent',
        ),
      ),
      'BaseAgendaIgrejaPeer' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseAgendaIgrejaPeer.php',
        'uses' => NULL,
        'extends' => NULL,
      ),
      'BaseAgendaIgrejaQuery' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseAgendaIgrejaQuery.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'ModelCriteria',
        ),
      ),
      'BaseAgendaPeer' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseAgendaPeer.php',
        'uses' => NULL,
        'extends' => NULL,
      ),
      'BaseAgendaQuery' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseAgendaQuery.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'ModelCriteria',
        ),
      ),
      'BaseAlternativa' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseAlternativa.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseObject',
          1 => 'Persistent',
        ),
      ),
      'BaseAlternativaPeer' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseAlternativaPeer.php',
        'uses' => NULL,
        'extends' => NULL,
      ),
      'BaseAlternativaQuery' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseAlternativaQuery.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'ModelCriteria',
        ),
      ),
      'BaseAndamentoProcesso' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseAndamentoProcesso.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseObject',
          1 => 'Persistent',
        ),
      ),
      'BaseAndamentoProcessoPeer' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseAndamentoProcessoPeer.php',
        'uses' => NULL,
        'extends' => NULL,
      ),
      'BaseAndamentoProcessoQuery' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseAndamentoProcessoQuery.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'ModelCriteria',
        ),
      ),
      'BaseAnotacaoCaso' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseAnotacaoCaso.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseObject',
          1 => 'Persistent',
        ),
      ),
      'BaseAnotacaoCasoPeer' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseAnotacaoCasoPeer.php',
        'uses' => NULL,
        'extends' => NULL,
      ),
      'BaseAnotacaoCasoQuery' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseAnotacaoCasoQuery.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'ModelCriteria',
        ),
      ),
      'BaseAnotacaoProcesso' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseAnotacaoProcesso.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseObject',
          1 => 'Persistent',
        ),
      ),
      'BaseAnotacaoProcessoPeer' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseAnotacaoProcessoPeer.php',
        'uses' => NULL,
        'extends' => NULL,
      ),
      'BaseAnotacaoProcessoQuery' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseAnotacaoProcessoQuery.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'ModelCriteria',
        ),
      ),
      'BaseAreaAdvocacia' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseAreaAdvocacia.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseObject',
          1 => 'Persistent',
        ),
      ),
      'BaseAreaAdvocaciaPeer' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseAreaAdvocaciaPeer.php',
        'uses' => NULL,
        'extends' => NULL,
      ),
      'BaseAreaAdvocaciaQuery' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseAreaAdvocaciaQuery.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'ModelCriteria',
        ),
      ),
      'BaseAuditoria' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseAuditoria.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseObject',
          1 => 'Persistent',
        ),
      ),
      'BaseAuditoriaPeer' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseAuditoriaPeer.php',
        'uses' => NULL,
        'extends' => NULL,
      ),
      'BaseAuditoriaQuery' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseAuditoriaQuery.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'ModelCriteria',
        ),
      ),
      'BaseAUsuarioPermissao' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseAUsuarioPermissao.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseObject',
          1 => 'Persistent',
        ),
      ),
      'BaseAUsuarioPermissaoPeer' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseAUsuarioPermissaoPeer.php',
        'uses' => NULL,
        'extends' => NULL,
      ),
      'BaseAUsuarioPermissaoQuery' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseAUsuarioPermissaoQuery.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'ModelCriteria',
        ),
      ),
      'BaseAvaliacaoAdvogado' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseAvaliacaoAdvogado.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseObject',
          1 => 'Persistent',
        ),
      ),
      'BaseAvaliacaoAdvogadoPeer' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseAvaliacaoAdvogadoPeer.php',
        'uses' => NULL,
        'extends' => NULL,
      ),
      'BaseAvaliacaoAdvogadoQuery' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseAvaliacaoAdvogadoQuery.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'ModelCriteria',
        ),
      ),
      'BaseAvaliacaoCliente' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseAvaliacaoCliente.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseObject',
          1 => 'Persistent',
        ),
      ),
      'BaseAvaliacaoClientePeer' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseAvaliacaoClientePeer.php',
        'uses' => NULL,
        'extends' => NULL,
      ),
      'BaseAvaliacaoClienteQuery' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseAvaliacaoClienteQuery.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'ModelCriteria',
        ),
      ),
      'BaseAvaliacaoRespostaForum' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseAvaliacaoRespostaForum.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseObject',
          1 => 'Persistent',
        ),
      ),
      'BaseAvaliacaoRespostaForumPeer' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseAvaliacaoRespostaForumPeer.php',
        'uses' => NULL,
        'extends' => NULL,
      ),
      'BaseAvaliacaoRespostaForumQuery' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseAvaliacaoRespostaForumQuery.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'ModelCriteria',
        ),
      ),
      'BaseCargo' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseCargo.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseObject',
          1 => 'Persistent',
        ),
      ),
      'BaseCargoPeer' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseCargoPeer.php',
        'uses' => NULL,
        'extends' => NULL,
      ),
      'BaseCargoPesquisa' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseCargoPesquisa.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseObject',
          1 => 'Persistent',
        ),
      ),
      'BaseCargoPesquisaPeer' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseCargoPesquisaPeer.php',
        'uses' => NULL,
        'extends' => NULL,
      ),
      'BaseCargoPesquisaQuery' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseCargoPesquisaQuery.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'ModelCriteria',
        ),
      ),
      'BaseCargoQuery' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseCargoQuery.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'ModelCriteria',
        ),
      ),
      'BaseCaso' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseCaso.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseObject',
          1 => 'Persistent',
        ),
      ),
      'BaseCasoPeer' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseCasoPeer.php',
        'uses' => NULL,
        'extends' => NULL,
      ),
      'BaseCasoProcesso' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseCasoProcesso.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseObject',
          1 => 'Persistent',
        ),
      ),
      'BaseCasoProcessoPeer' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseCasoProcessoPeer.php',
        'uses' => NULL,
        'extends' => NULL,
      ),
      'BaseCasoProcessoQuery' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseCasoProcessoQuery.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'ModelCriteria',
        ),
      ),
      'BaseCasoQuery' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseCasoQuery.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'ModelCriteria',
        ),
      ),
      'BaseCasoRelato' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseCasoRelato.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseObject',
          1 => 'Persistent',
        ),
      ),
      'BaseCasoRelatoPeer' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseCasoRelatoPeer.php',
        'uses' => NULL,
        'extends' => NULL,
      ),
      'BaseCasoRelatoQuery' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseCasoRelatoQuery.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'ModelCriteria',
        ),
      ),
      'BaseCategoria' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseCategoria.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseObject',
          1 => 'Persistent',
        ),
      ),
      'BaseCategoriaPeer' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseCategoriaPeer.php',
        'uses' => NULL,
        'extends' => NULL,
      ),
      'BaseCategoriaQuery' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseCategoriaQuery.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'ModelCriteria',
        ),
      ),
      'BaseCidade' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseCidade.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseObject',
          1 => 'Persistent',
        ),
      ),
      'BaseCidadePeer' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseCidadePeer.php',
        'uses' => NULL,
        'extends' => NULL,
      ),
      'BaseCidadeQuery' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseCidadeQuery.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'ModelCriteria',
        ),
      ),
      'BaseCliente' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseCliente.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseObject',
          1 => 'Persistent',
        ),
      ),
      'BaseClienteContato' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseClienteContato.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseObject',
          1 => 'Persistent',
        ),
      ),
      'BaseClienteContatoPeer' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseClienteContatoPeer.php',
        'uses' => NULL,
        'extends' => NULL,
      ),
      'BaseClienteContatoQuery' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseClienteContatoQuery.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'ModelCriteria',
        ),
      ),
      'BaseClientePeer' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseClientePeer.php',
        'uses' => NULL,
        'extends' => NULL,
      ),
      'BaseClienteQuery' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseClienteQuery.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'ModelCriteria',
        ),
      ),
      'BaseColetaPesquisa' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseColetaPesquisa.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseObject',
          1 => 'Persistent',
        ),
      ),
      'BaseColetaPesquisaPeer' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseColetaPesquisaPeer.php',
        'uses' => NULL,
        'extends' => NULL,
      ),
      'BaseColetaPesquisaQuery' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseColetaPesquisaQuery.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'ModelCriteria',
        ),
      ),
      'BaseComentarioNoticia' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseComentarioNoticia.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseObject',
          1 => 'Persistent',
        ),
      ),
      'BaseComentarioNoticiaPeer' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseComentarioNoticiaPeer.php',
        'uses' => NULL,
        'extends' => NULL,
      ),
      'BaseComentarioNoticiaQuery' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseComentarioNoticiaQuery.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'ModelCriteria',
        ),
      ),
      'BaseComunicado' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseComunicado.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseObject',
          1 => 'Persistent',
        ),
      ),
      'BaseComunicadoPeer' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseComunicadoPeer.php',
        'uses' => NULL,
        'extends' => NULL,
      ),
      'BaseComunicadoQuery' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseComunicadoQuery.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'ModelCriteria',
        ),
      ),
      'BaseContato' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseContato.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseObject',
          1 => 'Persistent',
        ),
      ),
      'BaseContatoIgreja' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseContatoIgreja.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseObject',
          1 => 'Persistent',
        ),
      ),
      'BaseContatoIgrejaPeer' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseContatoIgrejaPeer.php',
        'uses' => NULL,
        'extends' => NULL,
      ),
      'BaseContatoIgrejaQuery' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseContatoIgrejaQuery.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'ModelCriteria',
        ),
      ),
      'BaseContatoPeer' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseContatoPeer.php',
        'uses' => NULL,
        'extends' => NULL,
      ),
      'BaseContatoQuery' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseContatoQuery.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'ModelCriteria',
        ),
      ),
      'BaseContrato' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseContrato.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseObject',
          1 => 'Persistent',
        ),
      ),
      'BaseContratoPeer' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseContratoPeer.php',
        'uses' => NULL,
        'extends' => NULL,
      ),
      'BaseContratoQuery' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseContratoQuery.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'ModelCriteria',
        ),
      ),
      'BaseCurtidaForum' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseCurtidaForum.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseObject',
          1 => 'Persistent',
        ),
      ),
      'BaseCurtidaForumPeer' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseCurtidaForumPeer.php',
        'uses' => NULL,
        'extends' => NULL,
      ),
      'BaseCurtidaForumQuery' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseCurtidaForumQuery.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'ModelCriteria',
        ),
      ),
      'BaseDepartamento' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseDepartamento.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseObject',
          1 => 'Persistent',
        ),
      ),
      'BaseDepartamentoPeer' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseDepartamentoPeer.php',
        'uses' => NULL,
        'extends' => NULL,
      ),
      'BaseDepartamentoPesquisa' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseDepartamentoPesquisa.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseObject',
          1 => 'Persistent',
        ),
      ),
      'BaseDepartamentoPesquisaPeer' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseDepartamentoPesquisaPeer.php',
        'uses' => NULL,
        'extends' => NULL,
      ),
      'BaseDepartamentoPesquisaQuery' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseDepartamentoPesquisaQuery.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'ModelCriteria',
        ),
      ),
      'BaseDepartamentoQuery' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseDepartamentoQuery.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'ModelCriteria',
        ),
      ),
      'BaseEndereco' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseEndereco.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseObject',
          1 => 'Persistent',
        ),
      ),
      'BaseEndereco1' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseEndereco1.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseObject',
          1 => 'Persistent',
        ),
      ),
      'BaseEndereco1Peer' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseEndereco1Peer.php',
        'uses' => NULL,
        'extends' => NULL,
      ),
      'BaseEndereco1Query' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseEndereco1Query.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'ModelCriteria',
        ),
      ),
      'BaseEnderecoCorreio' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseEnderecoCorreio.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseObject',
          1 => 'Persistent',
        ),
      ),
      'BaseEnderecoCorreioPeer' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseEnderecoCorreioPeer.php',
        'uses' => NULL,
        'extends' => NULL,
      ),
      'BaseEnderecoCorreioQuery' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseEnderecoCorreioQuery.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'ModelCriteria',
        ),
      ),
      'BaseEnderecoPeer' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseEnderecoPeer.php',
        'uses' => NULL,
        'extends' => NULL,
      ),
      'BaseEnderecoQuery' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseEnderecoQuery.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'ModelCriteria',
        ),
      ),
      'BaseFaseProcesso' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseFaseProcesso.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseObject',
          1 => 'Persistent',
        ),
      ),
      'BaseFaseProcessoPeer' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseFaseProcessoPeer.php',
        'uses' => NULL,
        'extends' => NULL,
      ),
      'BaseFaseProcessoQuery' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseFaseProcessoQuery.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'ModelCriteria',
        ),
      ),
      'BaseFilhoMembro' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseFilhoMembro.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseObject',
          1 => 'Persistent',
        ),
      ),
      'BaseFilhoMembroPeer' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseFilhoMembroPeer.php',
        'uses' => NULL,
        'extends' => NULL,
      ),
      'BaseFilhoMembroQuery' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseFilhoMembroQuery.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'ModelCriteria',
        ),
      ),
      'BaseFormulario' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseFormulario.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseObject',
          1 => 'Persistent',
        ),
      ),
      'BaseFormularioPeer' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseFormularioPeer.php',
        'uses' => NULL,
        'extends' => NULL,
      ),
      'BaseFormularioQuery' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseFormularioQuery.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'ModelCriteria',
        ),
      ),
      'BaseForum' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseForum.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseObject',
          1 => 'Persistent',
        ),
      ),
      'BaseForumPeer' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseForumPeer.php',
        'uses' => NULL,
        'extends' => NULL,
      ),
      'BaseForumQuery' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseForumQuery.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'ModelCriteria',
        ),
      ),
      'BaseGravacao' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseGravacao.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseObject',
          1 => 'Persistent',
        ),
      ),
      'BaseGravacaoPeer' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseGravacaoPeer.php',
        'uses' => NULL,
        'extends' => NULL,
      ),
      'BaseGravacaoQuery' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseGravacaoQuery.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'ModelCriteria',
        ),
      ),
      'BaseIgreja' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseIgreja.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseObject',
          1 => 'Persistent',
        ),
      ),
      'BaseIgrejaPeer' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseIgrejaPeer.php',
        'uses' => NULL,
        'extends' => NULL,
      ),
      'BaseIgrejaQuery' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseIgrejaQuery.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'ModelCriteria',
        ),
      ),
      'BaseLiderMinisterio' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseLiderMinisterio.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseObject',
          1 => 'Persistent',
        ),
      ),
      'BaseLiderMinisterioPeer' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseLiderMinisterioPeer.php',
        'uses' => NULL,
        'extends' => NULL,
      ),
      'BaseLiderMinisterioQuery' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseLiderMinisterioQuery.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'ModelCriteria',
        ),
      ),
      'BaseLocalizacaoAdvogado' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseLocalizacaoAdvogado.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseObject',
          1 => 'Persistent',
        ),
      ),
      'BaseLocalizacaoAdvogadoPeer' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseLocalizacaoAdvogadoPeer.php',
        'uses' => NULL,
        'extends' => NULL,
      ),
      'BaseLocalizacaoAdvogadoQuery' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseLocalizacaoAdvogadoQuery.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'ModelCriteria',
        ),
      ),
      'BaseMembro' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseMembro.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseObject',
          1 => 'Persistent',
        ),
      ),
      'BaseMembroPeer' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseMembroPeer.php',
        'uses' => NULL,
        'extends' => NULL,
      ),
      'BaseMembroQuery' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseMembroQuery.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'ModelCriteria',
        ),
      ),
      'BaseMensagem' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseMensagem.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseObject',
          1 => 'Persistent',
        ),
      ),
      'BaseMensagemPeer' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseMensagemPeer.php',
        'uses' => NULL,
        'extends' => NULL,
      ),
      'BaseMensagemQuery' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseMensagemQuery.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'ModelCriteria',
        ),
      ),
      'BaseMetaPublicoAlvo' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseMetaPublicoAlvo.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseObject',
          1 => 'Persistent',
        ),
      ),
      'BaseMetaPublicoAlvoPeer' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseMetaPublicoAlvoPeer.php',
        'uses' => NULL,
        'extends' => NULL,
      ),
      'BaseMetaPublicoAlvoQuery' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseMetaPublicoAlvoQuery.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'ModelCriteria',
        ),
      ),
      'BaseMinisterio' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseMinisterio.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseObject',
          1 => 'Persistent',
        ),
      ),
      'BaseMinisterioPeer' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseMinisterioPeer.php',
        'uses' => NULL,
        'extends' => NULL,
      ),
      'BaseMinisterioQuery' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseMinisterioQuery.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'ModelCriteria',
        ),
      ),
      'BaseNoticia' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseNoticia.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseObject',
          1 => 'Persistent',
        ),
      ),
      'BaseNoticiaIgreja' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseNoticiaIgreja.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseObject',
          1 => 'Persistent',
        ),
      ),
      'BaseNoticiaIgrejaPeer' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseNoticiaIgrejaPeer.php',
        'uses' => NULL,
        'extends' => NULL,
      ),
      'BaseNoticiaIgrejaQuery' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseNoticiaIgrejaQuery.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'ModelCriteria',
        ),
      ),
      'BaseNoticiaPeer' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseNoticiaPeer.php',
        'uses' => NULL,
        'extends' => NULL,
      ),
      'BaseNoticiaQuery' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseNoticiaQuery.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'ModelCriteria',
        ),
      ),
      'BaseParentesco' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseParentesco.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseObject',
          1 => 'Persistent',
        ),
      ),
      'BaseParentescoPeer' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseParentescoPeer.php',
        'uses' => NULL,
        'extends' => NULL,
      ),
      'BaseParentescoQuery' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseParentescoQuery.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'ModelCriteria',
        ),
      ),
      'BasePedidoOracao' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BasePedidoOracao.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseObject',
          1 => 'Persistent',
        ),
      ),
      'BasePedidoOracaoPeer' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BasePedidoOracaoPeer.php',
        'uses' => NULL,
        'extends' => NULL,
      ),
      'BasePedidoOracaoQuery' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BasePedidoOracaoQuery.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'ModelCriteria',
        ),
      ),
      'BasePerfil' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BasePerfil.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseObject',
          1 => 'Persistent',
        ),
      ),
      'BasePerfilPeer' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BasePerfilPeer.php',
        'uses' => NULL,
        'extends' => NULL,
      ),
      'BasePerfilPermissao' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BasePerfilPermissao.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseObject',
          1 => 'Persistent',
        ),
      ),
      'BasePerfilPermissaoPeer' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BasePerfilPermissaoPeer.php',
        'uses' => NULL,
        'extends' => NULL,
      ),
      'BasePerfilPermissaoQuery' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BasePerfilPermissaoQuery.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'ModelCriteria',
        ),
      ),
      'BasePerfilQuery' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BasePerfilQuery.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'ModelCriteria',
        ),
      ),
      'BasePergunta' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BasePergunta.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseObject',
          1 => 'Persistent',
        ),
      ),
      'BasePerguntaOpcao' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BasePerguntaOpcao.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseObject',
          1 => 'Persistent',
        ),
      ),
      'BasePerguntaOpcaoPeer' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BasePerguntaOpcaoPeer.php',
        'uses' => NULL,
        'extends' => NULL,
      ),
      'BasePerguntaOpcaoQuery' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BasePerguntaOpcaoQuery.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'ModelCriteria',
        ),
      ),
      'BasePerguntaPeer' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BasePerguntaPeer.php',
        'uses' => NULL,
        'extends' => NULL,
      ),
      'BasePerguntaQuery' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BasePerguntaQuery.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'ModelCriteria',
        ),
      ),
      'BasePermissao' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BasePermissao.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseObject',
          1 => 'Persistent',
        ),
      ),
      'BasePermissaoPeer' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BasePermissaoPeer.php',
        'uses' => NULL,
        'extends' => NULL,
      ),
      'BasePermissaoQuery' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BasePermissaoQuery.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'ModelCriteria',
        ),
      ),
      'BasePesquisa' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BasePesquisa.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseObject',
          1 => 'Persistent',
        ),
      ),
      'BasePesquisaHabilitada' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BasePesquisaHabilitada.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseObject',
          1 => 'Persistent',
        ),
      ),
      'BasePesquisaHabilitadaPeer' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BasePesquisaHabilitadaPeer.php',
        'uses' => NULL,
        'extends' => NULL,
      ),
      'BasePesquisaHabilitadaQuery' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BasePesquisaHabilitadaQuery.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'ModelCriteria',
        ),
      ),
      'BasePesquisaPeer' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BasePesquisaPeer.php',
        'uses' => NULL,
        'extends' => NULL,
      ),
      'BasePesquisaQuery' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BasePesquisaQuery.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'ModelCriteria',
        ),
      ),
      'BasePesquisaUsuario' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BasePesquisaUsuario.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseObject',
          1 => 'Persistent',
        ),
      ),
      'BasePesquisaUsuarioPeer' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BasePesquisaUsuarioPeer.php',
        'uses' => NULL,
        'extends' => NULL,
      ),
      'BasePesquisaUsuarioQuery' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BasePesquisaUsuarioQuery.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'ModelCriteria',
        ),
      ),
      'BasePessoa' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BasePessoa.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseObject',
          1 => 'Persistent',
        ),
      ),
      'BasePessoaPeer' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BasePessoaPeer.php',
        'uses' => NULL,
        'extends' => NULL,
      ),
      'BasePessoaQuery' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BasePessoaQuery.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'ModelCriteria',
        ),
      ),
      'BasePg' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BasePg.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseObject',
          1 => 'Persistent',
        ),
      ),
      'BasePgMembro' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BasePgMembro.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseObject',
          1 => 'Persistent',
        ),
      ),
      'BasePgMembroPeer' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BasePgMembroPeer.php',
        'uses' => NULL,
        'extends' => NULL,
      ),
      'BasePgMembroQuery' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BasePgMembroQuery.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'ModelCriteria',
        ),
      ),
      'BasePgPeer' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BasePgPeer.php',
        'uses' => NULL,
        'extends' => NULL,
      ),
      'BasePgQuery' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BasePgQuery.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'ModelCriteria',
        ),
      ),
      'BasePgUsuario' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BasePgUsuario.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseObject',
          1 => 'Persistent',
        ),
      ),
      'BasePgUsuarioPeer' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BasePgUsuarioPeer.php',
        'uses' => NULL,
        'extends' => NULL,
      ),
      'BasePgUsuarioQuery' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BasePgUsuarioQuery.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'ModelCriteria',
        ),
      ),
      'BasePodcast' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BasePodcast.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseObject',
          1 => 'Persistent',
        ),
      ),
      'BasePodcastIgreja' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BasePodcastIgreja.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseObject',
          1 => 'Persistent',
        ),
      ),
      'BasePodcastIgrejaPeer' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BasePodcastIgrejaPeer.php',
        'uses' => NULL,
        'extends' => NULL,
      ),
      'BasePodcastIgrejaQuery' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BasePodcastIgrejaQuery.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'ModelCriteria',
        ),
      ),
      'BasePodcastPeer' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BasePodcastPeer.php',
        'uses' => NULL,
        'extends' => NULL,
      ),
      'BasePodcastQuery' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BasePodcastQuery.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'ModelCriteria',
        ),
      ),
      'BasePremio' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BasePremio.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseObject',
          1 => 'Persistent',
        ),
      ),
      'BasePremioPeer' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BasePremioPeer.php',
        'uses' => NULL,
        'extends' => NULL,
      ),
      'BasePremioQuery' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BasePremioQuery.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'ModelCriteria',
        ),
      ),
      'BaseProcesso' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseProcesso.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseObject',
          1 => 'Persistent',
        ),
      ),
      'BaseProcessoCaso' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseProcessoCaso.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseObject',
          1 => 'Persistent',
        ),
      ),
      'BaseProcessoCasoPeer' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseProcessoCasoPeer.php',
        'uses' => NULL,
        'extends' => NULL,
      ),
      'BaseProcessoCasoQuery' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseProcessoCasoQuery.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'ModelCriteria',
        ),
      ),
      'BaseProcessoPeer' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseProcessoPeer.php',
        'uses' => NULL,
        'extends' => NULL,
      ),
      'BaseProcessoQuery' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseProcessoQuery.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'ModelCriteria',
        ),
      ),
      'BaseProcessoRelato' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseProcessoRelato.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseObject',
          1 => 'Persistent',
        ),
      ),
      'BaseProcessoRelatoPeer' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseProcessoRelatoPeer.php',
        'uses' => NULL,
        'extends' => NULL,
      ),
      'BaseProcessoRelatoQuery' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseProcessoRelatoQuery.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'ModelCriteria',
        ),
      ),
      'BaseProfissao' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseProfissao.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseObject',
          1 => 'Persistent',
        ),
      ),
      'BaseProfissaoPeer' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseProfissaoPeer.php',
        'uses' => NULL,
        'extends' => NULL,
      ),
      'BaseProfissaoQuery' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseProfissaoQuery.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'ModelCriteria',
        ),
      ),
      'BasePublicoAlvo' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BasePublicoAlvo.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseObject',
          1 => 'Persistent',
        ),
      ),
      'BasePublicoAlvoPeer' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BasePublicoAlvoPeer.php',
        'uses' => NULL,
        'extends' => NULL,
      ),
      'BasePublicoAlvoQuery' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BasePublicoAlvoQuery.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'ModelCriteria',
        ),
      ),
      'BaseRelato' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseRelato.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseObject',
          1 => 'Persistent',
        ),
      ),
      'BaseRelatoPeer' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseRelatoPeer.php',
        'uses' => NULL,
        'extends' => NULL,
      ),
      'BaseRelatoQuery' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseRelatoQuery.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'ModelCriteria',
        ),
      ),
      'BaseResposta' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseResposta.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseObject',
          1 => 'Persistent',
        ),
      ),
      'BaseRespostaForum' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseRespostaForum.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseObject',
          1 => 'Persistent',
        ),
      ),
      'BaseRespostaForumPeer' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseRespostaForumPeer.php',
        'uses' => NULL,
        'extends' => NULL,
      ),
      'BaseRespostaForumQuery' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseRespostaForumQuery.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'ModelCriteria',
        ),
      ),
      'BaseRespostaOpcao' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseRespostaOpcao.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseObject',
          1 => 'Persistent',
        ),
      ),
      'BaseRespostaOpcaoPeer' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseRespostaOpcaoPeer.php',
        'uses' => NULL,
        'extends' => NULL,
      ),
      'BaseRespostaOpcaoQuery' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseRespostaOpcaoQuery.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'ModelCriteria',
        ),
      ),
      'BaseRespostaPeer' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseRespostaPeer.php',
        'uses' => NULL,
        'extends' => NULL,
      ),
      'BaseRespostaQuery' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseRespostaQuery.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'ModelCriteria',
        ),
      ),
      'BaseSolicitacao' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseSolicitacao.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseObject',
          1 => 'Persistent',
        ),
      ),
      'BaseSolicitacaoPeer' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseSolicitacaoPeer.php',
        'uses' => NULL,
        'extends' => NULL,
      ),
      'BaseSolicitacaoQuery' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseSolicitacaoQuery.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'ModelCriteria',
        ),
      ),
      'BaseSolicitacaoResgate' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseSolicitacaoResgate.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseObject',
          1 => 'Persistent',
        ),
      ),
      'BaseSolicitacaoResgatePeer' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseSolicitacaoResgatePeer.php',
        'uses' => NULL,
        'extends' => NULL,
      ),
      'BaseSolicitacaoResgateQuery' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseSolicitacaoResgateQuery.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'ModelCriteria',
        ),
      ),
      'BaseTabelaHonorarioOab' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseTabelaHonorarioOab.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseObject',
          1 => 'Persistent',
        ),
      ),
      'BaseTabelaHonorarioOabPeer' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseTabelaHonorarioOabPeer.php',
        'uses' => NULL,
        'extends' => NULL,
      ),
      'BaseTabelaHonorarioOabQuery' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseTabelaHonorarioOabQuery.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'ModelCriteria',
        ),
      ),
      'BaseTabulacao' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseTabulacao.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseObject',
          1 => 'Persistent',
        ),
      ),
      'BaseTabulacaoPeer' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseTabulacaoPeer.php',
        'uses' => NULL,
        'extends' => NULL,
      ),
      'BaseTabulacaoQuery' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseTabulacaoQuery.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'ModelCriteria',
        ),
      ),
      'BaseTagAreaAdvocacia' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseTagAreaAdvocacia.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseObject',
          1 => 'Persistent',
        ),
      ),
      'BaseTagAreaAdvocaciaPeer' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseTagAreaAdvocaciaPeer.php',
        'uses' => NULL,
        'extends' => NULL,
      ),
      'BaseTagAreaAdvocaciaQuery' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseTagAreaAdvocaciaQuery.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'ModelCriteria',
        ),
      ),
      'BaseTitulo' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseTitulo.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseObject',
          1 => 'Persistent',
        ),
      ),
      'BaseTituloPeer' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseTituloPeer.php',
        'uses' => NULL,
        'extends' => NULL,
      ),
      'BaseTituloQuery' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseTituloQuery.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'ModelCriteria',
        ),
      ),
      'BaseTPermissao' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseTPermissao.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseObject',
          1 => 'Persistent',
        ),
      ),
      'BaseTPermissaoPeer' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseTPermissaoPeer.php',
        'uses' => NULL,
        'extends' => NULL,
      ),
      'BaseTPermissaoQuery' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseTPermissaoQuery.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'ModelCriteria',
        ),
      ),
      'BaseTribunal' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseTribunal.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseObject',
          1 => 'Persistent',
        ),
      ),
      'BaseTribunalPeer' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseTribunalPeer.php',
        'uses' => NULL,
        'extends' => NULL,
      ),
      'BaseTribunalQuery' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseTribunalQuery.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'ModelCriteria',
        ),
      ),
      'BaseUf' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseUf.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseObject',
          1 => 'Persistent',
        ),
      ),
      'BaseUfPeer' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseUfPeer.php',
        'uses' => NULL,
        'extends' => NULL,
      ),
      'BaseUfQuery' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseUfQuery.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'ModelCriteria',
        ),
      ),
      'BaseUsuario' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseUsuario.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseObject',
          1 => 'Persistent',
        ),
      ),
      'BaseUsuarioFilial' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseUsuarioFilial.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseObject',
          1 => 'Persistent',
        ),
      ),
      'BaseUsuarioFilialPeer' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseUsuarioFilialPeer.php',
        'uses' => NULL,
        'extends' => NULL,
      ),
      'BaseUsuarioFilialQuery' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseUsuarioFilialQuery.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'ModelCriteria',
        ),
      ),
      'BaseUsuarioIgreja' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseUsuarioIgreja.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseObject',
          1 => 'Persistent',
        ),
      ),
      'BaseUsuarioIgrejaPeer' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseUsuarioIgrejaPeer.php',
        'uses' => NULL,
        'extends' => NULL,
      ),
      'BaseUsuarioIgrejaQuery' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseUsuarioIgrejaQuery.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'ModelCriteria',
        ),
      ),
      'BaseUsuarioPeer' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseUsuarioPeer.php',
        'uses' => NULL,
        'extends' => NULL,
      ),
      'BaseUsuarioPermissao' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseUsuarioPermissao.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseObject',
          1 => 'Persistent',
        ),
      ),
      'BaseUsuarioPermissaoPeer' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseUsuarioPermissaoPeer.php',
        'uses' => NULL,
        'extends' => NULL,
      ),
      'BaseUsuarioPermissaoQuery' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseUsuarioPermissaoQuery.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'ModelCriteria',
        ),
      ),
      'BaseUsuarioQuery' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseUsuarioQuery.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'ModelCriteria',
        ),
      ),
      'BaseValorPontoAvaliacaoForum' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseValorPontoAvaliacaoForum.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseObject',
          1 => 'Persistent',
        ),
      ),
      'BaseValorPontoAvaliacaoForumPeer' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseValorPontoAvaliacaoForumPeer.php',
        'uses' => NULL,
        'extends' => NULL,
      ),
      'BaseValorPontoAvaliacaoForumQuery' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseValorPontoAvaliacaoForumQuery.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'ModelCriteria',
        ),
      ),
      'BaseVideo' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseVideo.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseObject',
          1 => 'Persistent',
        ),
      ),
      'BaseVideoIgreja' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseVideoIgreja.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'BaseObject',
          1 => 'Persistent',
        ),
      ),
      'BaseVideoIgrejaPeer' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseVideoIgrejaPeer.php',
        'uses' => NULL,
        'extends' => NULL,
      ),
      'BaseVideoIgrejaQuery' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseVideoIgrejaQuery.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'ModelCriteria',
        ),
      ),
      'BaseVideoPeer' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseVideoPeer.php',
        'uses' => NULL,
        'extends' => NULL,
      ),
      'BaseVideoQuery' => 
      array (
        'file' => 'apps/default/layers/model/Default/om/BaseVideoQuery.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'ModelCriteria',
        ),
      ),
      'DefaultPageView' => 
      array (
        'file' => 'apps/default/layers/view/DefaultPageView.php',
        'uses' => NULL,
        'extends' => 
        array (
          0 => 'DefaultView',
        ),
      ),
    ),
    'packages' => 
    array (
      'components' => 
      array (
        'files' => 
        array (
          0 => 'AppMenuComponent',
          1 => 'ButtonGroupComponent',
          2 => 'CheckAllComponent',
          3 => 'CheckboxComponent',
          4 => 'CheckListComponent',
          5 => 'DateSelectComponent',
          6 => 'ErrorComponent',
          7 => 'FilterComponent',
          8 => 'FilterContainerComponent',
          9 => 'FormResearchComponent',
          10 => 'RequiredFieldIndicatorComponent',
          11 => 'StoryComponent',
        ),
      ),
      'page' => 
      array (
        'files' => 
        array (
          0 => 'ApiController',
          1 => 'DashboardController',
          2 => 'LoginController',
          3 => 'UsuarioController',
        ),
      ),
      'session' => 
      array (
        'files' => 
        array (
        ),
      ),
      'utils' => 
      array (
        'files' => 
        array (
          0 => 'BaseHtmlHelper',
          1 => 'HtmlHelper',
          2 => 'Utils',
        ),
      ),
      'control' => 
      array (
        'files' => 
        array (
          0 => 'DefaultPageController',
        ),
      ),
      'Default' => 
      array (
        'files' => 
        array (
          0 => 'Alternativa',
          1 => 'AlternativaPeer',
          2 => 'AlternativaQuery',
          3 => 'Auditoria',
          4 => 'AuditoriaPeer',
          5 => 'AuditoriaQuery',
          6 => 'AvaliacaoRespostaForum',
          7 => 'AvaliacaoRespostaForumPeer',
          8 => 'AvaliacaoRespostaForumQuery',
          9 => 'Cargo',
          10 => 'CargoPeer',
          11 => 'CargoPesquisa',
          12 => 'CargoPesquisaPeer',
          13 => 'CargoPesquisaQuery',
          14 => 'CargoQuery',
          15 => 'Categoria',
          16 => 'CategoriaPeer',
          17 => 'CategoriaQuery',
          18 => 'ColetaPesquisa',
          19 => 'ColetaPesquisaPeer',
          20 => 'ColetaPesquisaQuery',
          21 => 'ComentarioNoticia',
          22 => 'ComentarioNoticiaPeer',
          23 => 'ComentarioNoticiaQuery',
          24 => 'CurtidaForum',
          25 => 'CurtidaForumPeer',
          26 => 'CurtidaForumQuery',
          27 => 'Departamento',
          28 => 'DepartamentoPeer',
          29 => 'DepartamentoPesquisa',
          30 => 'DepartamentoPesquisaPeer',
          31 => 'DepartamentoPesquisaQuery',
          32 => 'DepartamentoQuery',
          33 => 'Endereco',
          34 => 'EnderecoCorreio',
          35 => 'EnderecoCorreioPeer',
          36 => 'EnderecoCorreioQuery',
          37 => 'EnderecoPeer',
          38 => 'EnderecoQuery',
          39 => 'Forum',
          40 => 'ForumPeer',
          41 => 'ForumQuery',
          42 => 'Noticia',
          43 => 'NoticiaPeer',
          44 => 'NoticiaQuery',
          45 => 'Perfil',
          46 => 'PerfilPeer',
          47 => 'PerfilPermissao',
          48 => 'PerfilPermissaoPeer',
          49 => 'PerfilPermissaoQuery',
          50 => 'PerfilQuery',
          51 => 'Pergunta',
          52 => 'PerguntaPeer',
          53 => 'PerguntaQuery',
          54 => 'Permissao',
          55 => 'PermissaoPeer',
          56 => 'PermissaoQuery',
          57 => 'Pesquisa',
          58 => 'PesquisaHabilitada',
          59 => 'PesquisaHabilitadaPeer',
          60 => 'PesquisaHabilitadaQuery',
          61 => 'PesquisaPeer',
          62 => 'PesquisaQuery',
          63 => 'Premio',
          64 => 'PremioPeer',
          65 => 'PremioQuery',
          66 => 'Resposta',
          67 => 'RespostaForum',
          68 => 'RespostaForumPeer',
          69 => 'RespostaForumQuery',
          70 => 'RespostaPeer',
          71 => 'RespostaQuery',
          72 => 'SolicitacaoResgate',
          73 => 'SolicitacaoResgatePeer',
          74 => 'SolicitacaoResgateQuery',
          75 => 'Usuario',
          76 => 'UsuarioFilial',
          77 => 'UsuarioFilialPeer',
          78 => 'UsuarioFilialQuery',
          79 => 'UsuarioPeer',
          80 => 'UsuarioPermissao',
          81 => 'UsuarioPermissaoPeer',
          82 => 'UsuarioPermissaoQuery',
          83 => 'UsuarioQuery',
          84 => 'ValorPontoAvaliacaoForum',
          85 => 'ValorPontoAvaliacaoForumPeer',
          86 => 'ValorPontoAvaliacaoForumQuery',
        ),
      ),
      'map' => 
      array (
        'files' => 
        array (
          0 => 'AdvogadoAreaAdvocaciaTableMap',
          1 => 'AdvogadoClienteTableMap',
          2 => 'AdvogadoContatoTableMap',
          3 => 'AdvogadoInscricaoOabTableMap',
          4 => 'AdvogadoInscricaoTableMap',
          5 => 'AdvogadoTableMap',
          6 => 'AgendaIgrejaTableMap',
          7 => 'AgendaTableMap',
          8 => 'AlternativaTableMap',
          9 => 'AndamentoProcessoTableMap',
          10 => 'AnotacaoCasoTableMap',
          11 => 'AnotacaoProcessoTableMap',
          12 => 'AreaAdvocaciaTableMap',
          13 => 'AuditoriaTableMap',
          14 => 'AUsuarioPermissaoTableMap',
          15 => 'AvaliacaoAdvogadoTableMap',
          16 => 'AvaliacaoClienteTableMap',
          17 => 'AvaliacaoRespostaForumTableMap',
          18 => 'CargoPesquisaTableMap',
          19 => 'CargoTableMap',
          20 => 'CasoProcessoTableMap',
          21 => 'CasoRelatoTableMap',
          22 => 'CasoTableMap',
          23 => 'CategoriaTableMap',
          24 => 'CidadeTableMap',
          25 => 'ClienteContatoTableMap',
          26 => 'ClienteTableMap',
          27 => 'ColetaPesquisaTableMap',
          28 => 'ComentarioNoticiaTableMap',
          29 => 'ComunicadoTableMap',
          30 => 'ContatoIgrejaTableMap',
          31 => 'ContatoTableMap',
          32 => 'ContratoTableMap',
          33 => 'CurtidaForumTableMap',
          34 => 'DepartamentoPesquisaTableMap',
          35 => 'DepartamentoTableMap',
          36 => 'Endereco1TableMap',
          37 => 'EnderecoCorreioTableMap',
          38 => 'EnderecoTableMap',
          39 => 'FaseProcessoTableMap',
          40 => 'FilhoMembroTableMap',
          41 => 'FormularioTableMap',
          42 => 'ForumTableMap',
          43 => 'GravacaoTableMap',
          44 => 'IgrejaTableMap',
          45 => 'LiderMinisterioTableMap',
          46 => 'LocalizacaoAdvogadoTableMap',
          47 => 'MembroTableMap',
          48 => 'MensagemTableMap',
          49 => 'MetaPublicoAlvoTableMap',
          50 => 'MinisterioTableMap',
          51 => 'NoticiaIgrejaTableMap',
          52 => 'NoticiaTableMap',
          53 => 'ParentescoTableMap',
          54 => 'PedidoOracaoTableMap',
          55 => 'PerfilPermissaoTableMap',
          56 => 'PerfilTableMap',
          57 => 'PerguntaOpcaoTableMap',
          58 => 'PerguntaTableMap',
          59 => 'PermissaoTableMap',
          60 => 'PesquisaHabilitadaTableMap',
          61 => 'PesquisaTableMap',
          62 => 'PesquisaUsuarioTableMap',
          63 => 'PessoaTableMap',
          64 => 'PgMembroTableMap',
          65 => 'PgTableMap',
          66 => 'PgUsuarioTableMap',
          67 => 'PodcastIgrejaTableMap',
          68 => 'PodcastTableMap',
          69 => 'PremioTableMap',
          70 => 'ProcessoCasoTableMap',
          71 => 'ProcessoRelatoTableMap',
          72 => 'ProcessoTableMap',
          73 => 'ProfissaoTableMap',
          74 => 'PublicoAlvoTableMap',
          75 => 'RelatoTableMap',
          76 => 'RespostaForumTableMap',
          77 => 'RespostaOpcaoTableMap',
          78 => 'RespostaTableMap',
          79 => 'SolicitacaoResgateTableMap',
          80 => 'SolicitacaoTableMap',
          81 => 'TabelaHonorarioOabTableMap',
          82 => 'TabulacaoTableMap',
          83 => 'TagAreaAdvocaciaTableMap',
          84 => 'TipoUsuarioTableMap',
          85 => 'TituloTableMap',
          86 => 'TPermissaoTableMap',
          87 => 'TribunalTableMap',
          88 => 'UfTableMap',
          89 => 'UsuarioFilialTableMap',
          90 => 'UsuarioIgrejaTableMap',
          91 => 'UsuarioPermissaoTableMap',
          92 => 'UsuarioTableMap',
          93 => 'ValorPontoAvaliacaoForumTableMap',
          94 => 'VideoIgrejaTableMap',
          95 => 'VideoTableMap',
        ),
      ),
      'om' => 
      array (
        'files' => 
        array (
          0 => 'BaseAdvogado',
          1 => 'BaseAdvogadoAreaAdvocacia',
          2 => 'BaseAdvogadoAreaAdvocaciaPeer',
          3 => 'BaseAdvogadoAreaAdvocaciaQuery',
          4 => 'BaseAdvogadoCliente',
          5 => 'BaseAdvogadoClientePeer',
          6 => 'BaseAdvogadoClienteQuery',
          7 => 'BaseAdvogadoContato',
          8 => 'BaseAdvogadoContatoPeer',
          9 => 'BaseAdvogadoContatoQuery',
          10 => 'BaseAdvogadoInscricao',
          11 => 'BaseAdvogadoInscricaoOab',
          12 => 'BaseAdvogadoInscricaoOabPeer',
          13 => 'BaseAdvogadoInscricaoOabQuery',
          14 => 'BaseAdvogadoInscricaoPeer',
          15 => 'BaseAdvogadoInscricaoQuery',
          16 => 'BaseAdvogadoPeer',
          17 => 'BaseAdvogadoQuery',
          18 => 'BaseAgenda',
          19 => 'BaseAgendaIgreja',
          20 => 'BaseAgendaIgrejaPeer',
          21 => 'BaseAgendaIgrejaQuery',
          22 => 'BaseAgendaPeer',
          23 => 'BaseAgendaQuery',
          24 => 'BaseAlternativa',
          25 => 'BaseAlternativaPeer',
          26 => 'BaseAlternativaQuery',
          27 => 'BaseAndamentoProcesso',
          28 => 'BaseAndamentoProcessoPeer',
          29 => 'BaseAndamentoProcessoQuery',
          30 => 'BaseAnotacaoCaso',
          31 => 'BaseAnotacaoCasoPeer',
          32 => 'BaseAnotacaoCasoQuery',
          33 => 'BaseAnotacaoProcesso',
          34 => 'BaseAnotacaoProcessoPeer',
          35 => 'BaseAnotacaoProcessoQuery',
          36 => 'BaseAreaAdvocacia',
          37 => 'BaseAreaAdvocaciaPeer',
          38 => 'BaseAreaAdvocaciaQuery',
          39 => 'BaseAuditoria',
          40 => 'BaseAuditoriaPeer',
          41 => 'BaseAuditoriaQuery',
          42 => 'BaseAUsuarioPermissao',
          43 => 'BaseAUsuarioPermissaoPeer',
          44 => 'BaseAUsuarioPermissaoQuery',
          45 => 'BaseAvaliacaoAdvogado',
          46 => 'BaseAvaliacaoAdvogadoPeer',
          47 => 'BaseAvaliacaoAdvogadoQuery',
          48 => 'BaseAvaliacaoCliente',
          49 => 'BaseAvaliacaoClientePeer',
          50 => 'BaseAvaliacaoClienteQuery',
          51 => 'BaseAvaliacaoRespostaForum',
          52 => 'BaseAvaliacaoRespostaForumPeer',
          53 => 'BaseAvaliacaoRespostaForumQuery',
          54 => 'BaseCargo',
          55 => 'BaseCargoPeer',
          56 => 'BaseCargoPesquisa',
          57 => 'BaseCargoPesquisaPeer',
          58 => 'BaseCargoPesquisaQuery',
          59 => 'BaseCargoQuery',
          60 => 'BaseCaso',
          61 => 'BaseCasoPeer',
          62 => 'BaseCasoProcesso',
          63 => 'BaseCasoProcessoPeer',
          64 => 'BaseCasoProcessoQuery',
          65 => 'BaseCasoQuery',
          66 => 'BaseCasoRelato',
          67 => 'BaseCasoRelatoPeer',
          68 => 'BaseCasoRelatoQuery',
          69 => 'BaseCategoria',
          70 => 'BaseCategoriaPeer',
          71 => 'BaseCategoriaQuery',
          72 => 'BaseCidade',
          73 => 'BaseCidadePeer',
          74 => 'BaseCidadeQuery',
          75 => 'BaseCliente',
          76 => 'BaseClienteContato',
          77 => 'BaseClienteContatoPeer',
          78 => 'BaseClienteContatoQuery',
          79 => 'BaseClientePeer',
          80 => 'BaseClienteQuery',
          81 => 'BaseColetaPesquisa',
          82 => 'BaseColetaPesquisaPeer',
          83 => 'BaseColetaPesquisaQuery',
          84 => 'BaseComentarioNoticia',
          85 => 'BaseComentarioNoticiaPeer',
          86 => 'BaseComentarioNoticiaQuery',
          87 => 'BaseComunicado',
          88 => 'BaseComunicadoPeer',
          89 => 'BaseComunicadoQuery',
          90 => 'BaseContato',
          91 => 'BaseContatoIgreja',
          92 => 'BaseContatoIgrejaPeer',
          93 => 'BaseContatoIgrejaQuery',
          94 => 'BaseContatoPeer',
          95 => 'BaseContatoQuery',
          96 => 'BaseContrato',
          97 => 'BaseContratoPeer',
          98 => 'BaseContratoQuery',
          99 => 'BaseCurtidaForum',
          100 => 'BaseCurtidaForumPeer',
          101 => 'BaseCurtidaForumQuery',
          102 => 'BaseDepartamento',
          103 => 'BaseDepartamentoPeer',
          104 => 'BaseDepartamentoPesquisa',
          105 => 'BaseDepartamentoPesquisaPeer',
          106 => 'BaseDepartamentoPesquisaQuery',
          107 => 'BaseDepartamentoQuery',
          108 => 'BaseEndereco',
          109 => 'BaseEndereco1',
          110 => 'BaseEndereco1Peer',
          111 => 'BaseEndereco1Query',
          112 => 'BaseEnderecoCorreio',
          113 => 'BaseEnderecoCorreioPeer',
          114 => 'BaseEnderecoCorreioQuery',
          115 => 'BaseEnderecoPeer',
          116 => 'BaseEnderecoQuery',
          117 => 'BaseFaseProcesso',
          118 => 'BaseFaseProcessoPeer',
          119 => 'BaseFaseProcessoQuery',
          120 => 'BaseFilhoMembro',
          121 => 'BaseFilhoMembroPeer',
          122 => 'BaseFilhoMembroQuery',
          123 => 'BaseFormulario',
          124 => 'BaseFormularioPeer',
          125 => 'BaseFormularioQuery',
          126 => 'BaseForum',
          127 => 'BaseForumPeer',
          128 => 'BaseForumQuery',
          129 => 'BaseGravacao',
          130 => 'BaseGravacaoPeer',
          131 => 'BaseGravacaoQuery',
          132 => 'BaseIgreja',
          133 => 'BaseIgrejaPeer',
          134 => 'BaseIgrejaQuery',
          135 => 'BaseLiderMinisterio',
          136 => 'BaseLiderMinisterioPeer',
          137 => 'BaseLiderMinisterioQuery',
          138 => 'BaseLocalizacaoAdvogado',
          139 => 'BaseLocalizacaoAdvogadoPeer',
          140 => 'BaseLocalizacaoAdvogadoQuery',
          141 => 'BaseMembro',
          142 => 'BaseMembroPeer',
          143 => 'BaseMembroQuery',
          144 => 'BaseMensagem',
          145 => 'BaseMensagemPeer',
          146 => 'BaseMensagemQuery',
          147 => 'BaseMetaPublicoAlvo',
          148 => 'BaseMetaPublicoAlvoPeer',
          149 => 'BaseMetaPublicoAlvoQuery',
          150 => 'BaseMinisterio',
          151 => 'BaseMinisterioPeer',
          152 => 'BaseMinisterioQuery',
          153 => 'BaseNoticia',
          154 => 'BaseNoticiaIgreja',
          155 => 'BaseNoticiaIgrejaPeer',
          156 => 'BaseNoticiaIgrejaQuery',
          157 => 'BaseNoticiaPeer',
          158 => 'BaseNoticiaQuery',
          159 => 'BaseParentesco',
          160 => 'BaseParentescoPeer',
          161 => 'BaseParentescoQuery',
          162 => 'BasePedidoOracao',
          163 => 'BasePedidoOracaoPeer',
          164 => 'BasePedidoOracaoQuery',
          165 => 'BasePerfil',
          166 => 'BasePerfilPeer',
          167 => 'BasePerfilPermissao',
          168 => 'BasePerfilPermissaoPeer',
          169 => 'BasePerfilPermissaoQuery',
          170 => 'BasePerfilQuery',
          171 => 'BasePergunta',
          172 => 'BasePerguntaOpcao',
          173 => 'BasePerguntaOpcaoPeer',
          174 => 'BasePerguntaOpcaoQuery',
          175 => 'BasePerguntaPeer',
          176 => 'BasePerguntaQuery',
          177 => 'BasePermissao',
          178 => 'BasePermissaoPeer',
          179 => 'BasePermissaoQuery',
          180 => 'BasePesquisa',
          181 => 'BasePesquisaHabilitada',
          182 => 'BasePesquisaHabilitadaPeer',
          183 => 'BasePesquisaHabilitadaQuery',
          184 => 'BasePesquisaPeer',
          185 => 'BasePesquisaQuery',
          186 => 'BasePesquisaUsuario',
          187 => 'BasePesquisaUsuarioPeer',
          188 => 'BasePesquisaUsuarioQuery',
          189 => 'BasePessoa',
          190 => 'BasePessoaPeer',
          191 => 'BasePessoaQuery',
          192 => 'BasePg',
          193 => 'BasePgMembro',
          194 => 'BasePgMembroPeer',
          195 => 'BasePgMembroQuery',
          196 => 'BasePgPeer',
          197 => 'BasePgQuery',
          198 => 'BasePgUsuario',
          199 => 'BasePgUsuarioPeer',
          200 => 'BasePgUsuarioQuery',
          201 => 'BasePodcast',
          202 => 'BasePodcastIgreja',
          203 => 'BasePodcastIgrejaPeer',
          204 => 'BasePodcastIgrejaQuery',
          205 => 'BasePodcastPeer',
          206 => 'BasePodcastQuery',
          207 => 'BasePremio',
          208 => 'BasePremioPeer',
          209 => 'BasePremioQuery',
          210 => 'BaseProcesso',
          211 => 'BaseProcessoCaso',
          212 => 'BaseProcessoCasoPeer',
          213 => 'BaseProcessoCasoQuery',
          214 => 'BaseProcessoPeer',
          215 => 'BaseProcessoQuery',
          216 => 'BaseProcessoRelato',
          217 => 'BaseProcessoRelatoPeer',
          218 => 'BaseProcessoRelatoQuery',
          219 => 'BaseProfissao',
          220 => 'BaseProfissaoPeer',
          221 => 'BaseProfissaoQuery',
          222 => 'BasePublicoAlvo',
          223 => 'BasePublicoAlvoPeer',
          224 => 'BasePublicoAlvoQuery',
          225 => 'BaseRelato',
          226 => 'BaseRelatoPeer',
          227 => 'BaseRelatoQuery',
          228 => 'BaseResposta',
          229 => 'BaseRespostaForum',
          230 => 'BaseRespostaForumPeer',
          231 => 'BaseRespostaForumQuery',
          232 => 'BaseRespostaOpcao',
          233 => 'BaseRespostaOpcaoPeer',
          234 => 'BaseRespostaOpcaoQuery',
          235 => 'BaseRespostaPeer',
          236 => 'BaseRespostaQuery',
          237 => 'BaseSolicitacao',
          238 => 'BaseSolicitacaoPeer',
          239 => 'BaseSolicitacaoQuery',
          240 => 'BaseSolicitacaoResgate',
          241 => 'BaseSolicitacaoResgatePeer',
          242 => 'BaseSolicitacaoResgateQuery',
          243 => 'BaseTabelaHonorarioOab',
          244 => 'BaseTabelaHonorarioOabPeer',
          245 => 'BaseTabelaHonorarioOabQuery',
          246 => 'BaseTabulacao',
          247 => 'BaseTabulacaoPeer',
          248 => 'BaseTabulacaoQuery',
          249 => 'BaseTagAreaAdvocacia',
          250 => 'BaseTagAreaAdvocaciaPeer',
          251 => 'BaseTagAreaAdvocaciaQuery',
          252 => 'BaseTitulo',
          253 => 'BaseTituloPeer',
          254 => 'BaseTituloQuery',
          255 => 'BaseTPermissao',
          256 => 'BaseTPermissaoPeer',
          257 => 'BaseTPermissaoQuery',
          258 => 'BaseTribunal',
          259 => 'BaseTribunalPeer',
          260 => 'BaseTribunalQuery',
          261 => 'BaseUf',
          262 => 'BaseUfPeer',
          263 => 'BaseUfQuery',
          264 => 'BaseUsuario',
          265 => 'BaseUsuarioFilial',
          266 => 'BaseUsuarioFilialPeer',
          267 => 'BaseUsuarioFilialQuery',
          268 => 'BaseUsuarioIgreja',
          269 => 'BaseUsuarioIgrejaPeer',
          270 => 'BaseUsuarioIgrejaQuery',
          271 => 'BaseUsuarioPeer',
          272 => 'BaseUsuarioPermissao',
          273 => 'BaseUsuarioPermissaoPeer',
          274 => 'BaseUsuarioPermissaoQuery',
          275 => 'BaseUsuarioQuery',
          276 => 'BaseValorPontoAvaliacaoForum',
          277 => 'BaseValorPontoAvaliacaoForumPeer',
          278 => 'BaseValorPontoAvaliacaoForumQuery',
          279 => 'BaseVideo',
          280 => 'BaseVideoIgreja',
          281 => 'BaseVideoIgrejaPeer',
          282 => 'BaseVideoIgrejaQuery',
          283 => 'BaseVideoPeer',
          284 => 'BaseVideoQuery',
        ),
      ),
      'view' => 
      array (
        'files' => 
        array (
          0 => 'DefaultPageView',
        ),
      ),
    ),
  ),
  'shared' => 
  array (
    'files' => 
    array (
    ),
    'packages' => 
    array (
      'page' => 
      array (
        'files' => 
        array (
        ),
      ),
      'session' => 
      array (
        'files' => 
        array (
        ),
      ),
    ),
  ),
  'system' => 
  array (
    'files' => 
    array (
    ),
    'packages' => 
    array (
    ),
  ),
);
?>
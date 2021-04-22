/* Standard client-side browser sniffer.
 */
WebBrowser = {
    /** Get user agent. */
    _getAgent: function() {
        return navigator.userAgent.toLowerCase();
    },

    /** Get major version number.  */
    _getMajor: function() {
        return parseInt(navigator.appVersion);
    },

    /** Get minor version number.  */
    _getMinor: function() {
        return parseFloat(navigator.appVersion);
    },

    // Platform tests.

    isLinux: function() {
        var agent = this._getAgent();
        return (agent.indexOf("inux") != -1);
    },

    isMac: function() {
        var agent = this._getAgent();
        return (agent.indexOf("macintosh") != -1);
    },

    isSun: function() {
        var agent = this._getAgent();
        return (agent.indexOf("sunos") != -1);
    },

    isWin: function() {
        var agent = this._getAgent();
        return (agent.indexOf("win") != -1 || agent.indexOf("16bit") != -1);
    },

    getPlatform: function() {
        if (this.isLinux()) return "linux";
        if (this.isMac()) return "mac";
        if (this.isSun()) return "sun";
        if (this.isWin()) return "win";
        return null;
    },

    getVersion: function() {
        if (this.isIE()) {
            return this._getMajorIE();
        } else {
            return this._getMajor();
        }
    },

    // Browser tests.

    isFirefox: function() {
        var agent = this._getAgent();
        return (agent.indexOf("firefox") != -1);
    },

    isGecko: function() {
        // Note: Safari is based on WebKit.
        var agent = this._getAgent();
        return (agent.indexOf("gecko") != -1 && agent.indexOf("safari") == -1);
    },

    isMozilla: function() {
        var agent = this._getAgent();
        return (agent.indexOf("gecko") != -1 && agent.indexOf("firefox") == -1
            && agent.indexOf("safari") == -1);
    },

    isSafari: function() {
        var agent = this._getAgent();
        return (agent.indexOf("safari") != -1) && (agent.indexOf("chrome") == -1);
    },

    isChrome: function() {
        var agent = this._getAgent();
        return (agent.indexOf("chrome") != -1);
    },

    isOpera: function() {
        var agent = this._getAgent();
        return (agent.indexOf("opera") != -1);
    },


    // Internet Explorer tests.

    // The detector and version extractor were taken from the IE Browser Detector
    // at http://www.pinlady.net/PluginDetect/IE/

    isIE: function() {
        // To detect IE, while being independent of the navigator.userAgent,
        // we use a combination of 2 methods:
        //
        //   a) Look at the document.documentMode. If this property is READ ONLY
        //    and is a number >=0, then we have IE 8+.
        //    According to Microsoft:
        //       When the current document has not yet been determined, documentMode returns a value of
        //       zero (0). This usually happens when a document is loading.
        //       When a return value of zero is received, try to determine the document
        //       compatibility mode at a later time.
        //
        //   b) See if the browser supports Conditional Compilation.
        //    If so, then we have IE < 11.
        //
        var tmp = document.documentMode;
        try {document.documentMode = "";} catch (e) {};

        // If we have a number, then IE.
        // If not, then if we can see the conditional compilation, then IE.
        // Else we have a non-IE browser.
        var retVal = typeof document.documentMode == "number" || eval("/*@cc_on!@*/!1");

        // We switch the value back to be unobtrusive for non-IE browsers
        try {document.documentMode = tmp;} catch(e) {};

        return retVal;

    },

    _getMajorIE: function() {
        // IE version from user agent
        //
        // For IE < 11, we look for "MSIE 10.0", etc...
        // For IE 11+, we look for "rv:11.0", etc...
        var verUA = 
           (/^(?:.*?[^a-zA-Z])??(?:MSIE|rv\s*\:)\s*(\d+\.?\d*)/i).test(navigator.userAgent || "") ?
           parseFloat(RegExp.$1, 10) : null;
      
        // Array of classids that can give us the IE version
        var CLASSID = [
            "{45EA75A0-A269-11D1-B5BF-0000F8051515}", // Internet Explorer Help
            "{3AF36230-A269-11D1-B5BF-0000F8051515}", // Offline Browsing Pack
            "{89820200-ECBD-11CF-8B85-00AA005B4383}"
        ];

        // Get true IE version using clientCaps.
        var obj = document.createElement("div");
        try {obj.style.behavior = "url(#default#clientcaps)"} catch (e) {};

        var verIEtrue = false;
        for (var x = 0; x < CLASSID.length; x++) {
            try {
                // This works for IE 5.5+.
                // For IE 5, we would need to insert obj into the DOM, then set the behaviour,
                // and then query.
                verIEtrue = obj.getComponentVersion(CLASSID[x],"componentid").replace(/,/g,".");
            } catch (e){ };
            if (verIEtrue) break;
        };

        // Given string "AA.BB.CCCC.DDDD", convert to a floating point number AA.BB
        // If verIEtrue is null, then verTrueFloat is 0.
        var verTrueFloat = parseFloat(verIEtrue || "0", 10);

        // For IE 8+, we look at document.documentMode
        //
        // Note: It is unlikely that a web designer would set document.documentMode to
        // some arbitrary value for IE < 8.
        var docModeIE = document.documentMode ||
           // If document.documentMode is not defined, then we have IE < 8 Desktop.
           // We try to artificially create a document mode number.
           //
           // if document.compatMode == "BackCompat", then we have Quirks mode, so return 5.
           // document.documentMode == 5 in Quirks mode.
           ((/back/i).test(document.compatMode || "") ? 5 : verTrueFloat) ||

           // Else return version from navigator.userAgent, or null
           verUA;

        // [number / null]
        //
        // Try to use True version first, because this gives the
        // actual browser version.
        //
        // If not available, then use the document mode.
        // In most cases, this will be the actual IE version, anyway.
        verIE = verTrueFloat || docModeIE;

        return verIE;
    },

    getBrowser: function() {
        var ret = "";
        if (this.isFirefox()) ret += "firefox ";
        if (this.isSafari()) ret += "safari ";
        if (this.isChrome()) ret += "chrome ";
        if (this.isOpera()) ret += "opera ";
        if (this.isGecko()) ret += "gecko ";
        if (this.isMozilla()) ret += "mozilla ";
        if (this.isIE()) ret += "ie" + _getMajorIE();
        return ret;
    },

    // Events

    stopPropagation: function(event) {
        if (this.isIE()) {
            event.cancelBubble = true;
            event.returnValue = false;
            return false;
        } else {
            event.stopPropagation();
            event.preventDefault();
            return false;
        }
    },

    getEvent: function(event) {
        if (this.isIE()) {
            return (event) ? event : ((window.event) ? window.event : null);
        } else {
            return event;
        }
    },

    getTarget: function(event) {
        if (this.isIE()) {
            return event.srcElement;
        } else {
            return event.target;
        }
    },

    addEvent: function(elmTarget, sEventName, fCallback) {
        if (document.addEventListener) {
            // Browsers that support W3C Standards compliant implementation of 
            // adding event handlers
            elmTarget.addEventListener(sEventName, fCallback, false);

        } else if (document.attachEvent) {
            // IE6 adding event handler
            elmTarget.attachEvent('on' + sEventName, fCallback);

        } else {
            // Browsers that do not support W3C or IE event functions
            return false;
        }
    },

    removeEvent: function(elmTarget, sEventName, fCallback) {
        if (document.addEventListener) {
            // Browsers that support W3C Standards compliant implementation of 
            // removing event handlers
            elmTarget.removeEventListener(sEventName, fCallback, false);

        } else if (document.attachEvent) {
            // IE6 removing event handler
            elmTarget.detachEvent('on' + sEventName, fCallback);

        } else {
            // Browsers that do not support W3C or IE event functions
            return false;
        }
    },

    changeEvent: function(elmTarget, fCallback) {
        if (document.addEventListener) {
            // Browsers that support W3C Standards compliant implementation of 
            // adding event handlers for property change
            elmTarget.addEventListener("DOMAttrModified", fCallback, false);

        } else if (document.attachEvent) {
            // IE6 adding event handler for property change
            elmTarget.attachEvent("onpropertychange", fCallback);

        } else {
            // Browsers that do not support W3C or IE event functions
            return false;
        }
    }
};

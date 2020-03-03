/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 12);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */
/***/ (function(module, exports) {

module.exports = jQuery;

/***/ }),
/* 1 */
/***/ (function(module, exports) {

function _classCallCheck(instance, Constructor) {
  if (!(instance instanceof Constructor)) {
    throw new TypeError("Cannot call a class as a function");
  }
}

module.exports = _classCallCheck;

/***/ }),
/* 2 */
/***/ (function(module, exports) {

function _defineProperties(target, props) {
  for (var i = 0; i < props.length; i++) {
    var descriptor = props[i];
    descriptor.enumerable = descriptor.enumerable || false;
    descriptor.configurable = true;
    if ("value" in descriptor) descriptor.writable = true;
    Object.defineProperty(target, descriptor.key, descriptor);
  }
}

function _createClass(Constructor, protoProps, staticProps) {
  if (protoProps) _defineProperties(Constructor.prototype, protoProps);
  if (staticProps) _defineProperties(Constructor, staticProps);
  return Constructor;
}

module.exports = _createClass;

/***/ }),
/* 3 */
/***/ (function(module, exports, __webpack_require__) {

var arrayWithoutHoles = __webpack_require__(4);

var iterableToArray = __webpack_require__(5);

var nonIterableSpread = __webpack_require__(6);

function _toConsumableArray(arr) {
  return arrayWithoutHoles(arr) || iterableToArray(arr) || nonIterableSpread();
}

module.exports = _toConsumableArray;

/***/ }),
/* 4 */
/***/ (function(module, exports) {

function _arrayWithoutHoles(arr) {
  if (Array.isArray(arr)) {
    for (var i = 0, arr2 = new Array(arr.length); i < arr.length; i++) {
      arr2[i] = arr[i];
    }

    return arr2;
  }
}

module.exports = _arrayWithoutHoles;

/***/ }),
/* 5 */
/***/ (function(module, exports) {

function _iterableToArray(iter) {
  if (Symbol.iterator in Object(iter) || Object.prototype.toString.call(iter) === "[object Arguments]") return Array.from(iter);
}

module.exports = _iterableToArray;

/***/ }),
/* 6 */
/***/ (function(module, exports) {

function _nonIterableSpread() {
  throw new TypeError("Invalid attempt to spread non-iterable instance");
}

module.exports = _nonIterableSpread;

/***/ }),
/* 7 */,
/* 8 */,
/* 9 */,
/* 10 */,
/* 11 */,
/* 12 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);

// EXTERNAL MODULE: external "jQuery"
var external_jQuery_ = __webpack_require__(0);
var external_jQuery_default = /*#__PURE__*/__webpack_require__.n(external_jQuery_);

// EXTERNAL MODULE: ./node_modules/@babel/runtime/helpers/classCallCheck.js
var classCallCheck = __webpack_require__(1);
var classCallCheck_default = /*#__PURE__*/__webpack_require__.n(classCallCheck);

// EXTERNAL MODULE: ./node_modules/@babel/runtime/helpers/createClass.js
var createClass = __webpack_require__(2);
var createClass_default = /*#__PURE__*/__webpack_require__.n(createClass);

// CONCATENATED MODULE: ./src/utils.js
// checks if box1 and box2 overlap
function overlapping(box1, box2) {
  var overlappingX = box1.x + box1.width >= box2.x && box2.x + box2.width >= box1.x;
  var overlappingY = box1.y + box1.height >= box2.y && box2.y + box2.height >= box1.y;
  return overlappingX && overlappingY;
} // chechks if box1 is completely inside box2

function inside(box1, box2) {
  var insideX = box1.x >= box2.x && box1.x + box1.width <= box2.x + box2.width;
  var insideY = box1.y >= box2.y && box1.y + box1.height <= box2.y + box2.height;
  return insideX && insideY;
} // chechks if box1 is completely inside box2

function insideHalf(box1, box2) {
  var insideX = box1.x + box1.width / 2 >= box2.x && box2.x + box2.width >= box1.x + box1.width / 2;
  var insideY = box1.y + box1.height / 2 >= box2.y && box2.y + box2.height >= box1.y + box1.height / 2;
  return insideX && insideY;
}
var debounce = function debounce(func, wait) {
  var timeout = null;
  return function () {
    var context = this;
    var args = arguments;

    var later = function later() {
      func.apply(context, args);
    };

    clearTimeout(timeout);
    timeout = setTimeout(later, wait);
  };
};
var hasTouchScreen = function hasTouchScreen() {
  var hasTouchScreen = false;

  if ("maxTouchPoints" in navigator) {
    hasTouchScreen = navigator.maxTouchPoints > 0;
  } else if ("msMaxTouchPoints" in navigator) {
    hasTouchScreen = navigator.msMaxTouchPoints > 0;
  } else {
    var mQ = window.matchMedia && matchMedia("(pointer:coarse)");

    if (mQ && mQ.media === "(pointer:coarse)") {
      hasTouchScreen = !!mQ.matches;
    } else if ('orientation' in window) {
      hasTouchScreen = true;
    } else {
      var UA = navigator.userAgent;
      hasTouchScreen = /\b(BlackBerry|webOS|iPhone|IEMobile)\b/i.test(UA) || /\b(Android|Windows Phone|iPad|iPod)\b/i.test(UA);
    }
  }

  return hasTouchScreen;
};
// EXTERNAL MODULE: ./node_modules/@babel/runtime/helpers/toConsumableArray.js
var toConsumableArray = __webpack_require__(3);
var toConsumableArray_default = /*#__PURE__*/__webpack_require__.n(toConsumableArray);

// CONCATENATED MODULE: ./src/components/globalService.js






var globalService_GlobalService =
/*#__PURE__*/
function () {
  function GlobalService() {
    classCallCheck_default()(this, GlobalService);

    this.props = {};
    this.newProps = {};
    this.renderCallbacks = [];
    this.resizeCallbacks = [];
    this.observeCallbacks = [];
    this.scrollCallbacks = [];
    this.currentMutationList = [];
    this.frameRendered = true;
    this.useOrientation = hasTouchScreen() && 'orientation' in window;

    this._init();
  }

  createClass_default()(GlobalService, [{
    key: "_init",
    value: function _init() {
      var $window = external_jQuery_default()(window);

      var updateProps = this._updateProps.bind(this);

      var renderLoop = this._renderLoop.bind(this);

      updateProps();
      external_jQuery_default()(updateProps);

      this._bindOnResize();

      this._bindOnScroll();

      this._bindOnLoad();

      this._bindObserver();

      this._bindCustomizer();

      requestAnimationFrame(renderLoop);
    }
  }, {
    key: "_bindOnResize",
    value: function _bindOnResize() {
      var $window = external_jQuery_default()(window);

      var updateProps = this._updateProps.bind(this);

      if (this.useOrientation) {
        $window.on('orientationchange', function () {
          $window.one('resize', updateProps);
        });
      } else {
        $window.on('resize', updateProps);
      }
    }
  }, {
    key: "_bindOnScroll",
    value: function _bindOnScroll() {
      external_jQuery_default()(window).on('scroll', this._updateScroll.bind(this));
    }
  }, {
    key: "_bindOnLoad",
    value: function _bindOnLoad() {
      external_jQuery_default()(window).on('load', this._updateProps.bind(this));
    }
  }, {
    key: "_bindObserver",
    value: function _bindObserver() {
      var self = this;

      var updateProps = this._updateProps.bind(this);

      var observeCallback = this._observeCallback.bind(this);

      var observeAndUpdateProps = function observeAndUpdateProps() {
        observeCallback();

        self._updateProps(true);

        self.currentMutationList = [];
      };

      var debouncedObserveCallback = debounce(observeAndUpdateProps, 300);

      if (!window.MutationObserver) {
        return;
      }

      var observer = new MutationObserver(function (mutationList) {
        self.currentMutationList = self.currentMutationList.concat(mutationList);
        debouncedObserveCallback();
      });
      observer.observe(document.body, {
        childList: true,
        subtree: true
      });
    }
  }, {
    key: "_bindCustomizer",
    value: function _bindCustomizer() {
      if (typeof wp !== "undefined" && typeof wp.customize !== "undefined") {
        if (typeof wp.customize.selectiveRefresh !== "undefined") {
          wp.customize.selectiveRefresh.bind('partial-content-rendered', this._updateProps.bind(this));
        }

        wp.customize.bind('change', this._updateProps.bind(this));
      }
    }
  }, {
    key: "_updateProps",
    value: function _updateProps() {
      var force = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : false;

      this._updateSize(force);

      this._updateScroll(force);
    }
  }, {
    key: "_observeCallback",
    value: function _observeCallback() {
      var mutationList = this.currentMutationList;
      external_jQuery_default.a.each(this.observeCallbacks, function (i, fn) {
        fn(mutationList);
      });
    }
  }, {
    key: "_renderLoop",
    value: function _renderLoop() {
      if (!this.frameRendered) {
        this._renderCallback();

        this.frameRendered = true;
      }

      window.requestAnimationFrame(this._renderLoop.bind(this));
    }
  }, {
    key: "_renderCallback",
    value: function _renderCallback() {
      var passedArguments = arguments;
      external_jQuery_default.a.each(this.renderCallbacks, function (i, fn) {
        fn.apply(void 0, toConsumableArray_default()(passedArguments));
      });
    }
  }, {
    key: "_resizeCallback",
    value: function _resizeCallback() {
      var passedArguments = arguments;
      external_jQuery_default.a.each(this.resizeCallbacks, function (i, fn) {
        fn.apply(void 0, toConsumableArray_default()(passedArguments));
      });
    }
  }, {
    key: "_scrollCallback",
    value: function _scrollCallback() {
      var passedArguments = arguments;
      external_jQuery_default.a.each(this.scrollCallbacks, function (i, fn) {
        fn.apply(void 0, toConsumableArray_default()(passedArguments));
      });
    }
  }, {
    key: "_updateScroll",
    value: function _updateScroll() {
      var force = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : false;
      this.newProps = Object.assign({}, this.newProps, {
        scrollY: window.pageYOffset,
        scrollX: window.pageXOffset
      });

      this._shouldUpdate(this._scrollCallback.bind(this));
    }
  }, {
    key: "_updateSize",
    value: function _updateSize() {
      var force = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : false;
      var body = document.body;
      var html = document.documentElement;
      var bodyScrollHeight = Math.max(body.scrollHeight, body.offsetHeight, html.clientHeight);
      var htmlScrollHeight = Math.max(html.scrollHeight, html.offsetHeight);
      this.newProps = Object.assign({}, this.newProps, {
        scrollHeight: Math.max(bodyScrollHeight, htmlScrollHeight),
        adminBarHeight: this.getAdminBarHeight(),
        windowWidth: this.useOrientation && window.screen && window.screen.availWidth || window.innerWidth,
        windowHeight: this.useOrientation && window.screen && window.screen.availHeight || window.innerHeight
      });

      this._shouldUpdate(this._resizeCallback.bind(this));
    }
  }, {
    key: "_shouldUpdate",
    value: function _shouldUpdate(callback) {
      var force = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : false;

      if (this._hasNewProps() || force) {
        this.props = Object.assign({}, this.props, this.newProps);
        this.newProps = {};
        this.frameRendered = false;

        if (typeof callback === "function") {
          callback();
        }
      }
    }
  }, {
    key: "_hasNewProps",
    value: function _hasNewProps() {
      var _this = this;

      return Object.keys(this.newProps).some(function (key) {
        return _this.newProps[key] !== _this.props[key];
      });
    }
  }, {
    key: "getAdminBarHeight",
    value: function getAdminBarHeight() {
      var adminBar = document.getElementById('wpadminbar');

      if (adminBar) {
        var box = adminBar.getBoundingClientRect();
        return box.height;
      }

      return 0;
    }
  }, {
    key: "registerOnResize",
    value: function registerOnResize(fn) {
      if (typeof fn === "function" && this.resizeCallbacks.indexOf(fn) < 0) {
        this.resizeCallbacks.push(fn);
      }
    }
  }, {
    key: "registerOnScroll",
    value: function registerOnScroll(fn) {
      if (typeof fn === "function" && this.scrollCallbacks.indexOf(fn) < 0) {
        this.scrollCallbacks.push(fn);
      }
    }
  }, {
    key: "registerObserverCallback",
    value: function registerObserverCallback(fn) {
      if (typeof fn === "function" && this.observeCallbacks.indexOf(fn) < 0) {
        this.observeCallbacks.push(fn);
      }
    }
  }, {
    key: "registerRender",
    value: function registerRender(fn) {
      if (typeof fn === "function" && this.renderCallbacks.indexOf(fn) < 0) {
        this.renderCallbacks.push(fn);
      }
    }
  }, {
    key: "getProps",
    value: function getProps() {
      return this.props;
    }
  }]);

  return GlobalService;
}();

/* harmony default export */ var globalService = (new globalService_GlobalService());
// CONCATENATED MODULE: ./src/components/hero.js




var hero_Hero =
/*#__PURE__*/
function () {
  function Hero(element) {
    classCallCheck_default()(this, Hero);

    this.element = element;
    this.progress = 0;
    this.paused = false;
    this.offset = 0;
    this.update();
    this.init();
  }

  createClass_default()(Hero, [{
    key: "init",
    value: function init() {
      var _this = this;

      globalService.registerOnScroll(function () {
        _this.update();
      });
    }
  }, {
    key: "update",
    value: function update() {
      var _GlobalService$getPro = globalService.getProps(),
          scrollY = _GlobalService$getPro.scrollY;

      this.box = this.element.getBoundingClientRect();
      this.view = {
        x: this.box.x,
        y: this.box.y + scrollY,
        width: this.box.width,
        height: this.box.height
      };
    }
  }]);

  return Hero;
}();


// CONCATENATED MODULE: ./src/components/commentsArea.js




var commentsArea_CommentsArea =
/*#__PURE__*/
function () {
  function CommentsArea(element) {
    classCallCheck_default()(this, CommentsArea);

    this.$element = external_jQuery_default()(element);
    this.$checkbox = this.$element.find('.c-comments-toggle__checkbox');
    this.$content = this.$element.find('.comments-area__content');
    this.$contentWrap = this.$element.find('.comments-area__wrap'); // overwrite CSS that hides the comments area content

    this.$contentWrap.css('display', 'block');
    this.$checkbox.on('change', this.onChange.bind(this));
    this.checkWindowLocationComments();
  }

  createClass_default()(CommentsArea, [{
    key: "onChange",
    value: function onChange() {
      this.toggle(false);
    }
  }, {
    key: "toggle",
    value: function toggle() {
      var instant = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : false;
      var $contentWrap = this.$contentWrap;
      var isChecked = this.$checkbox.prop('checked');
      var newHeight = isChecked ? this.$content.outerHeight() : 0;

      if (instant) {
        $contentWrap.css('height', newHeight);
      } else {
        $contentWrap.css('height', newHeight);

        if (isChecked) {
          $contentWrap.css('height', '');
        }
      }
    }
  }, {
    key: "checkWindowLocationComments",
    value: function checkWindowLocationComments() {
      if (window.location.href.indexOf('#comment') === -1) {
        this.$checkbox.prop('checked', false);
        this.toggle(true);
      }
    }
  }]);

  return CommentsArea;
}();


// CONCATENATED MODULE: ./src/components/header.js




var defaults = {
  offsetTargetElement: null
};

var header_Header =
/*#__PURE__*/
function () {
  function Header(element, args) {
    classCallCheck_default()(this, Header);

    if (!element) return;
    this.element = element;
    this.options = Object.assign({}, defaults, args);
    this.$header = external_jQuery_default()(this.element);
    this.$toggle = external_jQuery_default()('.c-menu-toggle');
    this.$toggleWrap = external_jQuery_default()('.c-menu-toggle__wrap');
    this.$toggleCheckbox = external_jQuery_default()('.c-menu-toggle__checkbox');
    this.scrolled = false;
    this.inversed = false;
    this.wasSticky = external_jQuery_default()('body').is('.has-site-header-fixed');
    this.offset = 0;
    this.scrollOffset = 0;
    this.mobileHeaderHeight = 0;
    this.createMobileHeader();
    this.onResize();
    this.render(false);
    globalService.registerOnResize(this.onResize.bind(this));
    this.initialize();
  }

  createClass_default()(Header, [{
    key: "initialize",
    value: function initialize() {
      external_jQuery_default()('.site-header__wrapper').css('transition', 'none');
      this.$header.addClass('site-header--fixed site-header--ready');
      this.$mobileHeader.addClass('site-header--fixed site-header--ready');
    }
  }, {
    key: "update",
    value: function update() {
      this.updatePageOffset();
      this.updateHeaderOffset();
      this.updateMobileHeaderOffset();
      this.bindClick();
    }
  }, {
    key: "onHeightUpdate",
    value: function onHeightUpdate(tween) {
      this.getProps();
      this.box = Object.assign(this.box, {
        height: tween.target.height
      });
      this.setVisibleHeaderHeight();
      this.update();
    }
  }, {
    key: "getMobileHeaderHeight",
    value: function getMobileHeaderHeight() {
      var mobileHeaderHeight = this.$mobileHeader.css('height', '').outerHeight();
      var toggleHeight = this.$toggleWrap.css('height', '').outerHeight();
      return Math.max(mobileHeaderHeight, toggleHeight);
    }
  }, {
    key: "isMobileHeaderVisibile",
    value: function isMobileHeaderVisibile() {
      return this.$mobileHeader.is(':visible');
    }
  }, {
    key: "setVisibleHeaderHeight",
    value: function setVisibleHeaderHeight() {
      this.visibleHeaderHeight = this.isMobileHeaderVisibile() ? this.mobileHeaderHeight : this.box.height;
    }
  }, {
    key: "getProps",
    value: function getProps() {
      this.box = this.element.getBoundingClientRect();
      this.scrollOffset = this.getScrollOffset();
      this.mobileHeaderHeight = this.getMobileHeaderHeight();
    }
  }, {
    key: "onResize",
    value: function onResize() {
      var $header = external_jQuery_default()(this.element);
      var wasScrolled = $header.hasClass('site-header--scrolled');
      $header.css('transition', 'none');
      $header.removeClass('site-header--scrolled');
      this.shouldMakeHeaderStatic();
      this.getProps();
      this.setVisibleHeaderHeight();
      $header.toggleClass('site-header--scrolled', wasScrolled);

      if (window.requestIdleCallback) {
        requestIdleCallback(function () {
          $header.css('transition', '');
        });
      } else {
        setTimeout(function () {
          $header.css('transition', '');
        }, 0);
      }

      this.update();
    }
  }, {
    key: "shouldMakeHeaderStatic",
    value: function shouldMakeHeaderStatic() {
      var $body = external_jQuery_default()('body');

      var _GlobalService$getPro = globalService.getProps(),
          windowHeight = _GlobalService$getPro.windowHeight;

      if (this.wasSticky) {
        $body.toggleClass('has-site-header-fixed', this.visibleHeaderHeight < windowHeight * 0.2);
      }
    }
  }, {
    key: "bindClick",
    value: function bindClick() {
      this.$toggleCheckbox.on('click', this.toggleNavStateClass);
    }
  }, {
    key: "updateHeaderOffset",
    value: function updateHeaderOffset() {
      if (!this.element) return;
      this.element.style.marginTop = this.offset + 'px';
    }
  }, {
    key: "updateMobileHeaderOffset",
    value: function updateMobileHeaderOffset() {
      if (!this.$mobileHeader) return;
      this.$mobileHeader.css({
        height: this.mobileHeaderHeight,
        marginTop: this.offset + 'px'
      });
      external_jQuery_default()('.site-header__inner-container').css({
        marginTop: this.mobileHeaderHeight
      });
      this.$toggleWrap.css({
        height: this.mobileHeaderHeight,
        marginTop: this.offset + 'px'
      });
    }
  }, {
    key: "getScrollOffset",
    value: function getScrollOffset() {
      var _GlobalService$getPro2 = globalService.getProps(),
          adminBarHeight = _GlobalService$getPro2.adminBarHeight,
          scrollY = _GlobalService$getPro2.scrollY;

      var offsetTargetElement = this.options.offsetTargetElement;

      if (offsetTargetElement) {
        var offsetTargetBox = offsetTargetElement.getBoundingClientRect();
        var targetBottom = offsetTargetBox.top + scrollY + offsetTargetBox.height;
        var headerOffset = adminBarHeight + this.offset + this.box.height / 2;
        return targetBottom - headerOffset;
      }

      return 0;
    }
  }, {
    key: "updatePageOffset",
    value: function updatePageOffset() {
      var $page = external_jQuery_default()('#page');
      var $hero = external_jQuery_default()('.has-hero .novablocks-hero').first().find('.novablocks-hero__foreground');
      $page.css('paddingTop', this.visibleHeaderHeight + this.offset + 'px');
      $hero.css('marginTop', this.offset + 'px');
    }
  }, {
    key: "createMobileHeader",
    value: function createMobileHeader() {
      if (this.createdMobileHeader) return;
      var $mobileHeader = external_jQuery_default()('.site-header--mobile');

      if ($mobileHeader.length) {
        this.$mobileHeader = $mobileHeader;
        this.createdMobileHeader = true;
        return;
      }

      this.$mobileHeader = external_jQuery_default()('<div class="site-header--mobile">');
      external_jQuery_default()('.c-branding').first().clone().appendTo(this.$mobileHeader);
      external_jQuery_default()('.menu-item--cart').first().clone().appendTo(this.$mobileHeader);
      this.$mobileHeader.insertAfter(this.$toggle);
      this.createdMobileHeader = true;
    }
  }, {
    key: "toggleNavStateClass",
    value: function toggleNavStateClass() {
      var isMenuOpen = external_jQuery_default()(this).prop('checked');
      var $body = external_jQuery_default()('body');
      $body.toggleClass('nav--is-open', isMenuOpen);
    }
  }, {
    key: "render",
    value: function render(inversed) {
      if (!this.element) return;

      var _GlobalService$getPro3 = globalService.getProps(),
          scrollY = _GlobalService$getPro3.scrollY;

      var scrolled = scrollY > this.scrollOffset;

      if (inversed !== this.inversed) {
        this.$header.toggleClass('site-header--normal', !inversed);
        this.inversed = inversed;
      }

      if (scrolled !== this.scrolled) {
        this.$header.toggleClass('site-header--scrolled', scrolled);
        this.scrolled = scrolled;
      }
    }
  }]);

  return Header;
}();

/* harmony default export */ var components_header = (header_Header);
// CONCATENATED MODULE: ./src/components/navbar.js




var MENU_ITEM = '.menu-item, .page_item';
var MENU_ITEM_WITH_CHILDREN = '.menu-item-has-children, .page_item_has_children';
var SUBMENU = '.sub-menu, .children';
var SUBMENU_LEFT_CLASS = 'has-submenu-left';
var HOVER_CLASS = 'hover';

var navbar_Navbar =
/*#__PURE__*/
function () {
  function Navbar() {
    classCallCheck_default()(this, Navbar);

    this.$menuItems = external_jQuery_default()(MENU_ITEM);
    this.$menuItemsWithChildren = this.$menuItems.filter(MENU_ITEM_WITH_CHILDREN).removeClass(HOVER_CLASS);
    this.$menuItemsWithChildrenLinks = this.$menuItemsWithChildren.children('a');
    this.initialize();
  }

  createClass_default()(Navbar, [{
    key: "initialize",
    value: function initialize() {
      this.onResize();
      this.addSocialMenuClass();
      this.initialized = true;
      globalService.registerOnResize(this.onResize.bind(this));
    }
  }, {
    key: "onResize",
    value: function onResize() {
      var mq = window.matchMedia("only screen and (min-width: 1000px)"); // we are on desktop

      if (mq.matches) {
        if (this.initialized && !this.desktop) {
          this.unbindClick();
        }

        if (!this.initialized || !this.desktop) {
          this.bindHoverIntent();
        }

        this.desktop = true;
        return;
      }

      if (this.initialized && this.desktop) {
        this.unbindHoverIntent();
      }

      if (!this.initialized || this.desktop) {
        this.bindClick();
      }

      this.desktop = false;
      return;
    }
  }, {
    key: "onClickMobile",
    value: function onClickMobile(event) {
      var $link = external_jQuery_default()(this);
      var $siblings = $link.parent().siblings().not($link);

      if ($link.is('.active')) {
        return;
      }

      event.preventDefault();
      $link.addClass('active').parent().addClass(HOVER_CLASS);
      $siblings.removeClass(HOVER_CLASS);
      $siblings.find('.active').removeClass('active');
    }
  }, {
    key: "bindClick",
    value: function bindClick() {
      this.$menuItemsWithChildrenLinks.on('click', this.onClickMobile);
    }
  }, {
    key: "unbindClick",
    value: function unbindClick() {
      this.$menuItemsWithChildrenLinks.off('click', this.onClickMobile);
    }
  }, {
    key: "bindHoverIntent",
    value: function bindHoverIntent() {
      this.$menuItems.hoverIntent({
        out: function out() {
          external_jQuery_default()(this).removeClass(HOVER_CLASS);
        },
        over: function over() {
          external_jQuery_default()(this).addClass(HOVER_CLASS);
        },
        timeout: 200
      });
    }
  }, {
    key: "unbindHoverIntent",
    value: function unbindHoverIntent() {
      this.$menuItems.off('mousemove.hoverIntent mouseenter.hoverIntent mouseleave.hoverIntent');
      delete this.$menuItems.hoverIntent_t;
      delete this.$menuItems.hoverIntent_s;
    }
  }, {
    key: "addSocialMenuClass",
    value: function addSocialMenuClass() {
      var $menuItem = external_jQuery_default()('.menu-item a');
      var bodyStyle = window.getComputedStyle(document.documentElement);
      var enableSocialIconsProp = bodyStyle.getPropertyValue('--enable-social-icons');
      var enableSocialIcons = !!parseInt(enableSocialIconsProp, 10);

      if (enableSocialIcons) {
        $menuItem.each(function (index, obj) {
          var elementStyle = window.getComputedStyle(obj);
          var elementIsSocialProp = elementStyle.getPropertyValue('--is-social');
          var elementIsSocial = !!parseInt(elementIsSocialProp, 10);

          if (elementIsSocial) {
            external_jQuery_default()(this).parent().addClass('social-menu-item');
          }
        });
      }
    }
  }]);

  return Navbar;
}();


// CONCATENATED MODULE: ./src/components/app.js










var app_App =
/*#__PURE__*/
function () {
  function App() {
    classCallCheck_default()(this, App);

    this.initializeHero();
    this.initializeHeader();
    this.initializeNavbar();
    this.initializeImages();
    this.initializeCommentsArea();
    this.initializeReservationForm(); // trigger resize

    globalService.registerObserverCallback(function (mutationList) {
      external_jQuery_default()(window).trigger('orientationchange').trigger('resize');
    });
    globalService.registerRender(this.render.bind(this));
  }

  createClass_default()(App, [{
    key: "render",
    value: function render() {
      var _GlobalService$getPro = globalService.getProps(),
          scrollY = _GlobalService$getPro.scrollY,
          adminBarHeight = _GlobalService$getPro.adminBarHeight;

      var header = this.header;
      var HeroCollection = this.HeroCollection;
      var overlap = HeroCollection.some(function (hero) {
        return insideHalf({
          x: header.box.x,
          y: header.box.y + scrollY,
          width: header.box.width,
          height: header.box.height
        }, {
          x: hero.box.x,
          y: hero.box.y,
          width: hero.box.width,
          height: hero.box.height
        });
      });
      header.render(overlap);
    }
  }, {
    key: "initializeImages",
    value: function initializeImages() {
      var showLoadedImages = this.showLoadedImages.bind(this);
      showLoadedImages();
      globalService.registerObserverCallback(function (mutationList) {
        external_jQuery_default.a.each(mutationList, function (i, mutationRecord) {
          external_jQuery_default.a.each(mutationRecord.addedNodes, function (j, node) {
            var nodeName = node.nodeName && node.nodeName.toLowerCase();

            if ('img' === nodeName || node.childNodes.length) {
              showLoadedImages(node);
            }
          });
        });
      });
    }
  }, {
    key: "initializeReservationForm",
    value: function initializeReservationForm() {
      globalService.registerObserverCallback(function (mutationList) {
        external_jQuery_default.a.each(mutationList, function (i, mutationRecord) {
          external_jQuery_default.a.each(mutationRecord.addedNodes, function (j, node) {
            var $node = external_jQuery_default()(node);

            if ($node.is('#ot-reservation-widget')) {
              $node.closest('.novablocks-opentable').addClass('is-loaded');
            }
          });
        });
      });
    }
  }, {
    key: "showLoadedImages",
    value: function showLoadedImages() {
      var container = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : document.body;
      external_jQuery_default()(container).imagesLoaded().progress(function (instance, image) {
        var className = image.isLoaded ? 'is-loaded' : 'is-broken';
        external_jQuery_default()(image.img).addClass(className);
      });
    }
  }, {
    key: "initializeHero",
    value: function initializeHero() {
      var heroElements = document.getElementsByClassName('novablocks-hero');
      var heroElementsArray = Array.from(heroElements);
      this.HeroCollection = heroElementsArray.map(function (element) {
        return new hero_Hero(element);
      });
      this.firstHero = heroElementsArray[0];
    }
  }, {
    key: "initializeCommentsArea",
    value: function initializeCommentsArea() {
      var $commentsArea = external_jQuery_default()('.comments-area');

      if ($commentsArea.length) {
        this.commentsArea = new commentsArea_CommentsArea($commentsArea.get(0));
      }
    }
  }, {
    key: "initializeHeader",
    value: function initializeHeader() {
      var $header = external_jQuery_default()('.site-header');

      if ($header.length) {
        this.header = new components_header($header.get(0));
      }
    }
  }, {
    key: "initializeNavbar",
    value: function initializeNavbar() {
      this.navbar = new navbar_Navbar();
    }
  }]);

  return App;
}();


// CONCATENATED MODULE: ./src/scripts.js



function scripts_initialize() {
  new app_App();
}

external_jQuery_default()(function () {
  scripts_initialize();
});

/***/ })
/******/ ]);
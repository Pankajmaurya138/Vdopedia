/*! @name @brightcove/videojs-social @version 3.9.1 @license UNLICENSED */
!function(e,t){"object"==typeof exports&&"undefined"!=typeof module?module.exports=t(require("video.js"),
	require("global/document"),require("global/window")):"function"==typeof define&&define.amd?
define(["video.js","global/document","global/window"],t):e.videojsSocial=t(e.videojs,e.document,e.window)}
(this,function(e,t,n){"use strict";e=e&&e.hasOwnProperty("default")?e.default:e,t=t&&t.hasOwnProperty("default")
	?t.default:t,n=n&&n.hasOwnProperty("default")?n.default:n;var o="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?
	function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?
	"symbol":typeof e},r=function(e,t){return"function"==typeof e.usingPlugin?e.usingPlugin(t):"ads"===t?"object"===o(e.ads):"playlist"===t?!(!e.playlist||"object"!==o(e.playlist.autoadvance_)):!!e[t]},i=function(e){e.postrollStarted=!1,e.postrollFinished=!1,e.postrollTimedOut=!1,e.sawNoPostrollEvent=!1},s=function(){var e=this;if(!this.endscreenState_){var t=this.endscreenState_={},n=function(){return e.trigger("endscreen")};i(t),this.on("adstart",function(){var n=e.ended();t.postrollStarted=n,t.postrollFinished=!n}),this.on("adend",function(){t.postrollFinished=e.ended()}),this.on("adtimeout",function(){t.postrollTimedOut=e.ended()}),this.on(["endscreen","loadstart"],function(){e.off("adend",n),i(t)}),this.on("nopostroll",function(){t.sawNoPostrollEvent=!0}),this.on("ended",function(){(function(e){if(!r(e,"playlist"))return!1;var t=e.playlist,n=t();return!(0!==t.autoadvance_.delay||!n.length)&&(t.repeat()||t.currentItem()!==n.length-1)})(e)||(!function(e){if(!r(e,"ads"))return!1;var t=e.endscreenState_;return!t.sawNoPostrollEvent&&t.postrollStarted&&!t.postrollFinished&&!t.postrollTimedOut}(e)?n():e.one("adend",n))})}};function l(e,t){e.prototype=Object.create(t.prototype),e.prototype.constructor=e,e.__proto__=t}function a(e,t){return t||(t=e.slice(0)),e.raw=t,e}e.registerPlugin?e.getPlugin("endscreen")||e.registerPlugin("endscreen",s):e.plugin("endscreen",s);var c=function(e){function t(t,n){var o;return(o=e.call(this,t,n)||this).controlText(o.localize("Share")),o}l(t,e);var n=t.prototype;return n.handleClick=function(){this.showOverlay()},n.showOverlay=function(){var e=this.player().socialOverlay;e&&e.open()},n.buildCSSClass=function(){return"vjs-share-control "+e.prototype.buildCSSClass.call(this)},t}(e.getComponent("Button"));function u(e){return e.replace(/\n\r?\s*/g,"")}var d=function(e){for(var t="",n=0;n<arguments.length;n++)t+=u(e[n])+(arguments[n+1]||"");return t};function f(){var e=a(["\n      //players.brightcove.net/\n      ","/\n      ","_","/\n      index.html\n      ","\n      ","\n    "]);return f=function(){return e},e}function p(){var e=a(['\n      <button class="vjs-restart vjs-icon-replay vjs-button">\n        <span class="vjs-control-text">',"</span>\n      </button>\n    "]);return p=function(){return e},e}function h(){var e=a(['\n        <label class="vjs-social-start-from" aria-label="','">\n          <span class="vjs-social-label-text">','</span>\n          <input type="text" title="'," ",'" placeholder=\n          "','" maxlength="10" value="','">\n        </label>\n      ']);return h=function(){return e},e}function v(){var e=a(['\n        <label class="vjs-social-direct-link" aria-label="','">\n          <span class="vjs-social-label-text">','</span>\n          <input type="text" readonly="true" value="">\n        </label>\n      ']);return v=function(){return e},e}function m(){var e=a(['\n      <label class="vjs-social-embed-code" aria-label="','">\n        <span class="vjs-social-label-text">','</span>\n        <input type="text" readonly="true" value="">\n      </label>\n    ']);return m=function(){return e},e}function y(){var e=a(['\n      <h1 class="vjs-social-title">',": ",'</h1>\n      <h2 class="vjs-social-description">','</h2>\n      <div class="vjs-social-share-links">\n        ',"\n      </div>\n      ","\n      ","\n      ","\n    "]);return y=function(){return e},e}function g(){var e=a(["\n      <iframe src='","' allowfullscreen frameborder=0></iframe>\n    "]);return g=function(){return e},e}function b(){var e=a(["\n      https://twitter.com/intent/tweet\n        ?original_referer=https%3A%2F%2Fabout.twitter.com%2Fresources%2Fbuttons\n        &text=","\n        &tw_p=tweetbutton\n        &url=","\n    "]);return b=function(){return e},e}function _(){var e=a(["\n      https://www.tumblr.com/share\n        ?v=3\n        &u=","\n        &t=","\n    "]);return _=function(){return e},e}function k(){var e=a(["\n      https://pinterest.com/pin/create/button/\n        ?url=","\n        &media=","\n        &description=","\n        &is_video=true\n    "]);return k=function(){return e},e}function C(){
		var e=a(["\n      https://www.linkedin.com/shareArticle\n        ?mini=true\n        &url=","\n        &title=","\n        &summary=","\n        &source=Classic\n    "]);
		return C=function(){return e},e}function S(){
			var e=a(["\n      https://plus.google.com/share\n        ?url=","\n    "]);
return S=function(){return e},e}
function j(){var e=a(["\n      https://www.facebook.com/sharer/sharer.php\n        ?u=","\n        &title=","\n    "]);
return j=function(){return e},e}var w,E=e.getComponent("ModalDialog"),I=e.dom||e,O=[{key:"facebook",title:"Facebook",href:function(e){return d(j(),e.url,e.title)}},{key:"google",classSuffix:"gplus",title:"Google+",href:function(e){return d(S(),e.url)}},{key:"linkedin",title:"LinkedIn",href:function(e){return d(C(),e.url,e.title,e.description)}},{key:"pinterest",title:"Pinterest",href:function(e){return d(k(),e.url,e.poster,e.title)}},{key:"tumblr",title:"Tumblr",href:function(e){return d(_(),e.url,e.title)}},{key:"twitter",title:"Twitter",href:function(e){return d(b(),e.title,e.url)}}],D=(w={width:600,height:400,top:100,left:100,titlebar:"yes",modal:"yes",resizable:"yes",toolbar:"no",status:1,location:"no",menubar:"no",centerscreen:"yes"},Object.keys(w).map(function(e){return e+"="+w[e]}).join(",")),P=/^\s*(0*[1-5]?\d|0*[1-5]?\d:[0-5]\d|\d+:[0-5]\d:[0-5]\d)\s*$/,x=function(o){function r(r,i){var s;return i.label=i.label||r.localize("Sharing Dialog"),(s=o.call(this,r,i)||this).boundEndscreenHandler_=e.bind(function(e){if(void 0===e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return e}(s),s.endscreenHandler_),s.isIframe_=n.parent!=n,s.on("modalfill",s.performSafeDomUpdates),s.on("modalopen",function(){if(s.toggleDock("hide"),r.el().contains(t.activeElement)||t.activeElement===r.el()){var e=s.el().querySelector(".vjs-social-share-links a")||s.el().querySelector(".vjs-social-direct-link input")||s.el().querySelector(".vjs-social-embed-code input");e&&e.focus()}}),s.on("modalclose",function(){s.toggleDock("show"),s.player().socialButton.el().focus()}),s.on(s.contentEl(),"click",s.delegateClick),s.on("modalfill",function(){var e=s.offsetEl();s.options_.deeplinking?e&&s.on(e,"change",s.performSafeDomUpdates):e&&s.off(e,"change",s.performSafeDomUpdates)}),s.on(["beforemodalfill","dipose"],function(){var e=s.offsetEl();e&&s.off(e,"change",s.performSafeDomUpdates)}),s}l(r,o);var i=r.prototype;return i.directLinkEl=function(){return this.contentEl().querySelector(".vjs-social-direct-link input")},i.embedCodeEl=function(){return this.contentEl().querySelector(".vjs-social-embed-code input")},i.offsetEl=function(){return this.contentEl().querySelector(".vjs-social-start-from input")},i.toggleDock=function(e){this.options_.hasDock&&(this.player().getChild("shelf")[e](),this.player().getChild("title")[e]())},i.delegateClick=function(e){e.preventDefault(),e.target===this.contentEl().querySelector(".vjs-restart")?(this.close(),this.player().currentTime(0),this.player().play()):e.target===this.directLinkEl()||e.target===this.embedCodeEl()?e.target.select():I.hasClass(e.target,"vjs-social-share-link")&&n.open(e.target.href,"_blank",D)},i.buildCSSClass=function(){return"vjs-social-overlay "+o.prototype.buildCSSClass.call(this)},i.performSafeDomUpdates=function(){var e=this.offsetEl(),t=this.directLinkEl(),n=this.embedCodeEl();if(e){var o=!!e.value&&!P.test(e.value);I.toggleClass(e,"vjs-invalid",o)}t&&(t.value=this.getDirectLink()),n&&(n.value=this.getEmbedCode())},i.getEmbedCode=function(){var e=this.player(),t=this.getPlayerMediaInfo_(),n=this.getEmbedUrl_({accountId:e.options_["data-account"],playerId:e.options_["data-player"],embedId:e.options_["data-embed"],videoId:t.id?"?videoId="+t.id:""});return this.options_.embedCode||d(g(),n)},i.setEmbedCode=function(e){void 0===e&&(e=""),this.options_.embedCode=e},i.getDirectLink=function(){return this.getVideoUrl_(!0)},i.setDirectLink=function(e){void 0===e&&(e=""),this.options_.url=e},i.asEndscreen=function(e){var t=this;return"boolean"==typeof e&&this.asEndscreen_!==e&&(this.asEndscreen_=e,e?(this.player().height()<=300&&this.addClass("vjs-social-short-player"),this.addClass("vjs-social-as-endscreen"),this.open(),this.one("modalclose",function(){return t.asEndscreen(!1)})):(this.removeClass("vjs-social-short-player"),this.removeClass("vjs-social-as-endscreen"))),this.asEndscreen_},i.endscreenHandler_=function(){this.asEndscreen(!0)},i.content=function(){var e=t.createElement("form");return e.innerHTML=d(y(),this.localize("Share"),this.getTitle_(),this.getDescription_(),this.contentForSocialButtons_(this.options_.services,this.options_.customServices),this.contentForDirectLink_(),this.contentForEmbed_(),this.contentForRestart_()),e},i.contentForEmbed_=function(){if(!0===this.options_.removeEmbed)return"";var e=this.localize("Embed Code"),t=this.localize("Read Only: Embed Code");return d(m(),t,e)},i.contentForDirectLink_=function(){var e=this.options_.deeplinking,t=!0!==this.options_.removeDirect;if(!e&&!t)return"";var n="";if(t){var o=this.localize("Direct Link"),r=this.localize("Read Only")+": "+this.localize("Direct Link To Content");n+=d(v(),r,o)}if(e){var i=this.localize("Start From"),s=this.localize("The offset must be specified using the following pattern:"),l=P.test(this.options_.offset)?this.options_.offset:"";n+=d(h(),i,i,s,"hh:mm:ss","hh:mm:ss",l)}return n},i.contentForRestart_=function(){if(!this.asEndscreen())return"";var e=this.localize("Restart");return d(p(),e)},i.contentForSocialButtons_=function(t,n){void 0===n&&(n=[]);var o=this.player(),r={description:encodeURIComponent(this.options_.description),poster:encodeURIComponent(o.poster()||""),title:encodeURIComponent(this.getTitle_()),url:encodeURIComponent(this.getVideoUrl_())};return n=n.filter(function(t){return!(t.mobileOnly&&!e.browser.IS_IOS&&!e.browser.IS_ANDROID)}).map(function(e){return e.hrefTemplate&&"function"!=typeof e.href&&(e.href=function(t){var n=e.hrefTemplate;for(var o in t){var r=new RegExp("{{"+o+"}}","g");n=n.replace(r,t[o])}return n}),e}),O.filter(function(e){return t[e.key]}).concat(n).map(function(e,t){return'\n        <a href="'+e.href(r)+'"\n            class="vjs-social-share-link '+(e.className?e.className:"vjs-icon-"+(e.classSuffix||e.key))+'"\n            aria-role="link"\n            aria-label="'+o.localize("Share on {{network}}").replace("{{network}}",o.localize(e.title))+'"\n            title="'+o.localize(e.title)+'"\n            '+(e.bgColor?'style="background-color:'+e.bgColor+'"':"")+'\n            target="_blank">\n          <span class="vjs-control-text">'+o.localize(e.title)+"</span>\n        </a>\n      "}).join("")},i.getConvertedOffsetHash_=function(){if(this.options_.deeplinking){var e=this.offsetEl(),t=this.convertOffset_(e&&e.value||this.options_.offset);if(t)return"#t="+t}return""},i.addPlaylistVideoId_=function(e){var t=this.player(),o="function"==typeof t.playlist&&t.playlist();if(Array.isArray(o)&&o.length){var r=t.playlist.currentItem(),i=r>-1&&o[r];if(i&&i.id){var s=(n.location.search?"&":"?")+"playlistVideoId="+i.id,l=/([?&])playlistVideoId=[^&]+/,a=e.match(l);a?e=e.replace(l,a[1]+"playlistVideoId="+i.id):e+=s}}return e},i.getVideoUrl_=function(e){var o;return o=this.options_.url?this.options_.url:this.isIframe_?t.referrer:this.addPlaylistVideoId_(n.location.href),e&&(o+=this.getConvertedOffsetHash_()),o},i.getEmbedUrl_=function(e){return this.isIframe_?n.location.href:d(f(),e.accountId,e.playerId,e.embedId,e.videoId,this.getConvertedOffsetHash_())},i.getPlayerMediaInfo_=function(){var e=this.player();return e.mediainfo||e.options_["data-media"]||{}},i.getTitle_=function(){return this.options_.title||this.getPlayerMediaInfo_().name||""},i.getDescription_=function(){return this.options_.description||this.getPlayerMediaInfo_().description||""},i.convertOffset_=function(e){var t=0,n=[1,60,3600],o="";if("string"==typeof e){var r=e.split(":");if(r.length>=1&&r.length<=3){for(var i=0;i<r.length;++i){var s=parseInt(r[i],10)*n[r.length-1-i];if(isNaN(s))return"";t+=s}t>=n[2]&&0!==Math.floor(t/n[2])&&(o=Math.floor(t/n[2])+"h",t%=n[2]),t>=n[1]&&0!==Math.floor(t/n[1])&&(o+=Math.floor(t/n[1])+"m",t%=n[1]),t>0&&(o+=t+"s")}}return o},r}(E);x.prototype.options_=e.mergeOptions(E.prototype.options_,{fillAlways:!0,temporary:!1});var z={title:"",description:"",url:"",label:"",embedCode:"",deeplinking:!1,displayAfterVideo:!1,offset:"00:00:00",buttonParent:"controlBar",hasDock:!1,removeDirect:!1,removeEmbed:!1,services:{facebook:!0,google:!1,twitter:!0,tumblr:!0,pinterest:!0,linkedin:!0},customServices:[]},F=e.getComponent("Component"),U=e.registerPlugin||e.plugin,T=e.dom||e,R=function(e){return e instanceof F},V=function(e,t){var n;n=e.socialSettings,"[object Object]"===Object.prototype.toString.call(n)&&e.socialButton.dispose();var o=function e(t,n){var o=n.buttonParent,r="string"==typeof o?t.getChild(o):o;return R(r)||o===z.buttonParent||(n.buttonParent=z.buttonParent,r=e(t,n)),R(r)?r:null}(e,t),r=o.addChild("socialButton",t);if(o.one(r,"dispose",function(){return o.removeChild(r)}),t.buttonParent===z.buttonParent){var i=o.el().querySelector(".vjs-spacer");o.el().insertBefore(r.el(),i.nextSibling)}else o===e.shelf&&(r.removeClass("vjs-control"),T.removeClass(r.$(".vjs-control-text"),"vjs-control-text"));return r},L=function(t,n){var o=t.socialOverlay,r=!1;return o&&(r=o.opened(),o.close()),!o||o&&o.options_.temporary?(function(t){var n=function(){e.log.warn('Using "show" to open the social plugin overlay is deprecated. Use open() instead!'),this.open()},o=function(){e.log.warn('Using "hide" to close the social plugin overlay is deprecated. Use close() instead!'),this.close()};t.show=n,t.hide=o,t.on("beforemodalopen",function(){delete t.show}),t.on("modalopen",function(){t.show=n}),t.on("beforemodalclose",function(){delete t.hide}),t.on("modalclose",function(){t.hide=o})}(o=t.addChild("socialOverlay",n)),T.addClass(o.$(".vjs-close-button",o),"vjs-icon-cancel"),t.one(o,"dispose",function(){t.off("endscreen",o.boundEndscreenHandler_),t.removeChild(o)})):(o.options_=e.mergeOptions({},o.options_,n),n.displayAfterVideo||t.off("endscreen",o.boundEndscreenHandler_),o.fill()),n.displayAfterVideo&&(t.off("endscreen",o.boundEndscreenHandler_),t.on("endscreen",o.boundEndscreenHandler_)),r&&o.open(),o},q=function(t){var n=this,o=e.mergeOptions(z,t);o.removeDirect&&(o.deeplinking=!1),o.displayAfterVideo&&this.endscreen(),this.ready(function(){o.hasDock=R(n.title)&&R(n.shelf),n.socialButton=V(n,o),n.socialOverlay=L(n,o),n.socialSettings=o,n.on("loadstart",function(){n.socialOverlay.close()});var e=function(){var e;(e=n).socialOverlay.toggleClass("vjs-social-small",function(){return e.currentWidth()<e.breakpoints().small+1})};n.on("playerresize",e),n.socialOverlay.on("dispose",function(){n.off("playerresize",e)}),e.call(n)})};return q.VERSION="3.9.1",e.registerComponent("SocialButton",c),e.registerComponent("SocialOverlay",x),U("social",q),q});
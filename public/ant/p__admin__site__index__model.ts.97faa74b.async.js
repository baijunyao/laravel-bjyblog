(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([[33],{I7MR:function(e,t,a){"use strict";var r=a("g09b");Object.defineProperty(t,"__esModule",{value:!0}),t.default=void 0;var n=r(a("p0pE")),u=r(a("d6i3")),c=a("TlAs"),l={namespace:"adminSite",state:{data:{list:[],pagination:{}}},effects:{fetch:u.default.mark(function e(t,a){var r,n,l,d;return u.default.wrap(function(e){while(1)switch(e.prev=e.next){case 0:return r=t.payload,n=a.call,l=a.put,e.next=4,n(c.queryRule,r);case 4:return d=e.sent,e.next=7,l({type:"save",payload:d});case 7:case"end":return e.stop()}},e)}),add:u.default.mark(function e(t,a){var r,n,l,d,s;return u.default.wrap(function(e){while(1)switch(e.prev=e.next){case 0:return r=t.payload,n=t.callback,l=a.call,d=a.put,e.next=4,l(c.addRule,r);case 4:return s=e.sent,e.next=7,d({type:"new",payload:s});case 7:n&&n();case 8:case"end":return e.stop()}},e)}),update:u.default.mark(function e(t,a){var r,n,l,d,s;return u.default.wrap(function(e){while(1)switch(e.prev=e.next){case 0:return r=t.payload,n=t.callback,l=a.call,d=a.put,e.next=4,l(c.updateRule,r);case 4:return s=e.sent,e.next=7,d({type:"edit",payload:s});case 7:n&&n();case 8:case"end":return e.stop()}},e)}),destroy:u.default.mark(function e(t,a){var r,n,l,d,s;return u.default.wrap(function(e){while(1)switch(e.prev=e.next){case 0:return r=t.payload,n=t.callback,l=a.call,d=a.put,e.next=4,l(c.removeRule,r);case 4:return s=e.sent,e.next=7,d({type:"edit",payload:s});case 7:n&&n();case 8:case"end":return e.stop()}},e)}),forceDelete:u.default.mark(function e(t,a){var r,n,l,d;return u.default.wrap(function(e){while(1)switch(e.prev=e.next){case 0:return r=t.payload,n=t.callback,l=a.call,d=a.put,e.next=4,l(c.forceDeleteRule,r);case 4:return e.next=6,d({type:"remove",payload:r.id});case 6:n&&n();case 7:case"end":return e.stop()}},e)}),restore:u.default.mark(function e(t,a){var r,n,l,d,s;return u.default.wrap(function(e){while(1)switch(e.prev=e.next){case 0:return r=t.payload,n=t.callback,l=a.call,d=a.put,e.next=4,l(c.restoreRule,r);case 4:return s=e.sent,e.next=7,d({type:"edit",payload:s});case 7:n&&n();case 8:case"end":return e.stop()}},e)})},reducers:{save:function(e,t){return(0,n.default)({},e,{data:t.payload})},new:function(e,t){return void 0!==e&&e.data.list.push(t.payload.data),(0,n.default)({data:t.payload},e)},edit:function(e,t){return void 0!==e&&e.data.list.forEach(function(a,r){a.id===t.payload.data.id&&(e.data.list[r]=t.payload.data)}),(0,n.default)({data:t.payload},e)},remove:function(e,t){return void 0!==e&&e.data.list.forEach(function(a,r){a.id===t.payload&&e.data.list.splice(r,1)}),(0,n.default)({data:t.payload},e)}}},d=l;t.default=d},TlAs:function(e,t,a){"use strict";var r=a("g09b");Object.defineProperty(t,"__esModule",{value:!0}),t.queryRule=l,t.addRule=s,t.updateRule=p,t.removeRule=f,t.forceDeleteRule=w,t.restoreRule=v;var n=r(a("d6i3")),u=r(a("1l/V")),c=r(a("sy1d"));function l(e){return d.apply(this,arguments)}function d(){return d=(0,u.default)(n.default.mark(function e(t){return n.default.wrap(function(e){while(1)switch(e.prev=e.next){case 0:return e.abrupt("return",(0,c.default)("/api/sites",{params:t}));case 1:case"end":return e.stop()}},e)})),d.apply(this,arguments)}function s(e){return i.apply(this,arguments)}function i(){return i=(0,u.default)(n.default.mark(function e(t){return n.default.wrap(function(e){while(1)switch(e.prev=e.next){case 0:return e.abrupt("return",(0,c.default)("/api/sites",{method:"POST",data:t}));case 1:case"end":return e.stop()}},e)})),i.apply(this,arguments)}function p(e){return o.apply(this,arguments)}function o(){return o=(0,u.default)(n.default.mark(function e(t){return n.default.wrap(function(e){while(1)switch(e.prev=e.next){case 0:return e.abrupt("return",(0,c.default)("/api/sites/".concat(t.id),{method:"PUT",data:t}));case 1:case"end":return e.stop()}},e)})),o.apply(this,arguments)}function f(e){return h.apply(this,arguments)}function h(){return h=(0,u.default)(n.default.mark(function e(t){return n.default.wrap(function(e){while(1)switch(e.prev=e.next){case 0:return e.abrupt("return",(0,c.default)("/api/sites/".concat(t.id),{method:"DELETE",data:t}));case 1:case"end":return e.stop()}},e)})),h.apply(this,arguments)}function w(e){return y.apply(this,arguments)}function y(){return y=(0,u.default)(n.default.mark(function e(t){return n.default.wrap(function(e){while(1)switch(e.prev=e.next){case 0:return e.abrupt("return",(0,c.default)("/api/sites/".concat(t.id,"/forceDelete"),{method:"DELETE",data:t}));case 1:case"end":return e.stop()}},e)})),y.apply(this,arguments)}function v(e){return m.apply(this,arguments)}function m(){return m=(0,u.default)(n.default.mark(function e(t){return n.default.wrap(function(e){while(1)switch(e.prev=e.next){case 0:return e.abrupt("return",(0,c.default)("/api/sites/".concat(t.id,"/restore"),{method:"PATCH",data:t}));case 1:case"end":return e.stop()}},e)})),m.apply(this,arguments)}}}]);
(()=>{"use strict";var e,t,a,s,n,r,c,o=(r=function(e){var r=0;[].slice.call(a.querySelectorAll('[data-kt-searchable="true"]')).map((function(e){var t=n.getQuery();-1!==e.innerText.toLowerCase().indexOf(t.toLowerCase())?(e.classList.remove("d-none"),r++):e.classList.add("d-none")})),t.classList.add("d-none"),0===r?(a.classList.add("d-none"),s.classList.remove("d-none")):(a.classList.remove("d-none"),s.classList.add("d-none")),e.complete()},c=function(e){t.classList.remove("d-none"),a.classList.add("d-none"),s.classList.add("d-none")},{init:function(){(e=document.querySelector("#kt_docs_search"))&&(e.querySelector('[data-kt-search-element="wrapper"]'),e.querySelector('[data-kt-search-element="form"]'),t=e.querySelector('[data-kt-search-element="main"]'),a=e.querySelector('[data-kt-search-element="results"]'),s=e.querySelector('[data-kt-search-element="empty"]'),(n=new KTSearch(e)).on("kt.search.process",r),n.on("kt.search.clear",c))}});KTUtil.onDOMContentLoaded((function(){o.init()}))})();
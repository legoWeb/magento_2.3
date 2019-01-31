define([
    "Polushkin_GridLink/js/grid/column/link/base"
], function (Column) {
    "use strict";

    return Column.extend({
        defaults: {
            idAttrName: "customer_id",
            route: "/customer/index/edit/id/"
        }
    });
});
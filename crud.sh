#!/bin/bash
./yii giiant-batch --interactive=0 --overwrite=1 \
--tables=dmstr_redirect \
--tablePrefix=dmstr_ \
--enableI18N=1 \
--modelNamespace=dmstr\\modules\\redirect\\models \
--crudControllerNamespace=dmstr\\modules\\redirect\\controllers \
--crudSearchModelNamespace=dmstr\\modules\\redirect\\models\\search \
--crudPathPrefix= \
--messageCategory=app \
--crudViewPath=@app/vendor/dmstr/yii2-redirect-module/views \
--crudProviders=schmunk42\\giiant\\crud\\providers\\CallbackProvider,dmstr\\modules\\redirect\\providers\\CrudProvider \
--modelBaseClass=dmstr\\modules\\redirect\\models\\ActiveRecord \
--modelQueryNamespace=dmstr\\modules\\redirect\\models\\query

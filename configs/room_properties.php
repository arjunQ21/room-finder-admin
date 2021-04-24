<?php
return json_decode(file_get_contents(__DIR__."/room_properties.json"), true)['properties'][0] ;
<?php

test('system is healthy')->get('/api/health')->assertOk();

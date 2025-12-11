-- Fix FK host_idTrip_foreign - Remove it because PostgreSQL INHERITS doesn't work with FKs
-- Run with: psql -U <user> -d <database> -f fix_host_constraint.sql

-- Drop existing constraint (quote identifiers because of camelCase)
ALTER TABLE host DROP CONSTRAINT IF EXISTS "host_idTrip_foreign";
ALTER TABLE host DROP CONSTRAINT IF EXISTS host_idTrip_foreign;
ALTER TABLE host DROP CONSTRAINT IF EXISTS host_idtrip_foreign;

-- Note: We don't recreate the FK because PostgreSQL table inheritance (INHERITS)
-- doesn't work well with foreign keys - the parent table doesn't see child table rows
-- when checking FK constraints.

-- Show current FK on host (should only show idTripStep FK now)
SELECT tc.constraint_name, kcu.column_name, ccu.table_name AS referenced_table
FROM information_schema.table_constraints tc
JOIN information_schema.key_column_usage kcu ON tc.constraint_name = kcu.constraint_name AND tc.table_schema = kcu.table_schema
JOIN information_schema.constraint_column_usage ccu ON ccu.constraint_name = tc.constraint_name AND ccu.table_schema = tc.table_schema
WHERE tc.constraint_type = 'FOREIGN KEY' AND tc.table_name = 'host';

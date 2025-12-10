-- Fix FK host_idTrip_foreign to point to trip instead of prebuilttrip
-- Run with: psql -U <user> -d <database> -f fix_host_constraint.sql

-- Drop existing constraint (quote identifiers because of camelCase)
ALTER TABLE host DROP CONSTRAINT IF EXISTS "host_idTrip_foreign";
ALTER TABLE host DROP CONSTRAINT IF EXISTS host_idTrip_foreign;
ALTER TABLE host DROP CONSTRAINT IF EXISTS host_idtrip_foreign;

-- Recreate correct constraint to trip(idTrip)
ALTER TABLE host
ADD CONSTRAINT "host_idTrip_foreign"
FOREIGN KEY ("idTrip") REFERENCES trip("idTrip") ON DELETE CASCADE;

-- Show current FK on host
SELECT tc.constraint_name, kcu.column_name, ccu.table_name AS referenced_table
FROM information_schema.table_constraints tc
JOIN information_schema.key_column_usage kcu ON tc.constraint_name = kcu.constraint_name AND tc.table_schema = kcu.table_schema
JOIN information_schema.constraint_column_usage ccu ON ccu.constraint_name = tc.constraint_name AND ccu.table_schema = tc.table_schema
WHERE tc.constraint_type = 'FOREIGN KEY' AND tc.table_name = 'host';

import { exec } from 'child_process';
import { symlink, rm } from 'fs/promises';
import { join } from 'path';
import { readdir, readFile } from 'fs/promises';

const rootNodeModules = join(process.cwd(), 'node_modules');
const modulesDir = join(process.cwd(), 'Modules');

const runCommand = (command, cwd) => {
    return new Promise((resolve, reject) => {
        exec(command, { cwd }, (error, stdout, stderr) => {
            if (error) {
                reject(`Error running ${command} in ${cwd}: ${error}`);
            } else {
                resolve(stdout || stderr);
            }
        });
    });
};

const createSymlink = async (target, path) => {
    try {
        await rm(path, { force: true, recursive: true });
        await symlink(target, path, 'dir');
        console.log(`Symlink created: ${path} -> ${target}`);
    } catch (error) {
        console.error(`Failed to create symlink: ${error}`);
    }
};

const linkAndBuildModules = async () => {
    const statusesPath = join(process.cwd(), 'modules_statuses.json');
    const modulesStatuses = JSON.parse(await readFile(statusesPath, 'utf8'));
    const activeModules = Object.keys(modulesStatuses).filter(module => modulesStatuses[module]);

    for (const module of activeModules) {
        const modulePath = join(modulesDir, module);
        const moduleNodeModules = join(modulePath, 'node_modules');
        await createSymlink(rootNodeModules, moduleNodeModules);

        try {
            console.log(`Running npm run build in ${modulePath}`);
            await runCommand('npm run build', modulePath);
            console.log(`Successfully built ${module}`);
        } catch (error) {
            console.error(`Error in building ${module}: ${error}`);
        }
    }
};

linkAndBuildModules();
